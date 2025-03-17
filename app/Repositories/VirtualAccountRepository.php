<?php

namespace App\Repositories;

use Exception;
use App\Helpers\noncestrHelper;
use App\Helpers\signatureHelper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VirtualAccountRepository
{
    public function createVirtualAccountOLD($loginUserId)
    {

        //Retrieve the Bank Code
        $bankCode1 = env('BANKCODE1');
        $bankCode2 = env('BANKCODE2');

        //Check if Virtual Account Existed
        $exist = User::where('id', $loginUserId)
            ->where('vwallet_is_created', 0)
            ->exists();
        if ($exist) {

            $AccessKey = env('MONNIFYAPI').':'.env('MONNIFYSECRET');
            $ApiKey = base64_encode($AccessKey);

            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => env('BASE_URL').'/v1/auth/login/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => [
                    "Authorization: Basic {$ApiKey}",
                ],
            ]);

            $json = curl_exec($ch);
            $result = json_decode($json);
            curl_close($ch);

            //Retrieve accessToken from response body
            $accessToken = $result->responseBody->accessToken;
            $random = md5(uniqid(Auth::user()->email));
            $refno = substr(strtolower($random), 0, 11);
            $bvn = Auth::user()->idNumber;
            //Request Account Creation
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => env('BASE_URL2').'/v2/bank-transfer/reserved-accounts',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
											"accountReference": "'.$refno.'",
											"accountName": "'.Auth::user()->first_name.'",
											"currencyCode": "NGN",
											"contractCode": "'.env('MONNIFYCONTRACT').'",
											"customerEmail": "'.Auth::user()->email.'",
											"customerName": "'.Auth::user()->first_name.' '.Auth::user()->last_name.'",
											"bvn":"'.$bvn.'",
                                            "getAllAvailableBanks": false,
											"preferredBanks": ["'.$bankCode1.'","'.$bankCode2.'"]
									 }',
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer '.$accessToken,
                    'Content-Type: application/json',
                ],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
            $retrieveData = json_decode($response, true);

            try {
                    // Proceed only if the request was successful
                    if (!$retrieveData['requestSuccessful']) {
                        throw new Exception('Request was not successful.');
                    }
                
                    $responseBody = $retrieveData['responseBody'];
                    $account_name = 'Fee24 consultant LTD-' . $responseBody['accountName'];
                    $accountReference = $responseBody['accountReference'];
                    $accounts = $responseBody['accounts'];
                
                    $insertData = [];
                
                    // Iterate through accounts and prepare data for insertion
                    foreach ($accounts as $account) {
                        if (in_array($account['bankCode'], [$bankCode1, $bankCode2])) {
                            $insertData[] = [
                                'user_id' => $loginUserId,
                                'accountReference' => $accountReference,
                                'accountNo' => $account['accountNumber'],
                                'accountName' => $account_name,
                                'bankName' => $account['bankName'],
                                'created_at' => now(),
                                'updated_at' => now(),
                            ];
                        }
                    }
                
                    // Perform batch insert if there is data to insert
                    if (!empty($insertData)) {
                        DB::table('virtual_accounts')->insert($insertData);
                    }
                
                    // Update user to indicate virtual account creation
                    User::where('id', $loginUserId)->update(['vwallet_is_created' => 1]);
                
                } catch (\Exception $e) {
                    // Log the exception with a unique identifier
                    Log::error('Error creating virtual account for user ' . $loginUserId . ': ' . $e->getMessage());
                    // Return a JSON response with error information
                    return response()->json(['error' => 'Failed to create virtual account.'], 500);
                }


        }

    }
      public function createVirtualAccount($loginUserId)
    {
          $exist = User::where('id', $loginUserId)
            ->where('vwallet_is_created', 0)
            ->exists();
        if ($exist) {
        $customer_name = auth()->user()->first_name . ' ' . Auth::user()->last_name;

        try {

            $requestTime = (int) (microtime(true) * 1000);
            $noncestr = noncestrHelper::generateNonceStr();
            $accountReference = "Z" . strtoupper(bin2hex(random_bytes(6)));

            $data = [
                'requestTime' => $requestTime,
                'identityType' => 'personal',
                'licenseNumber' =>  auth()->user()->idNumber,
                'virtualAccountName' => $customer_name,
                'version' => env('VERSION'),
                'customerName' => $customer_name,
                'email' => auth()->user()->email,
                'accountReference' => $accountReference,
                'nonceStr' => $noncestr,
            ];

            $signature = signatureHelper::generate_signature($data, config('keys.private'));

            $url = env('BASE_URL3') . 'api/v2/virtual/account/label/create';
            $token = env('BEARER_TOKEN');
            $headers = [
                'Accept: application/json, text/plain, */*',
                'CountryCode: NG',
                "Authorization: Bearer $token",
                "Signature: $signature",
                'Content-Type: application/json',
            ];

            // Initialize cURL
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            // Execute request
            $response = curl_exec($ch);

            // Check for cURL errors
            if (curl_errno($ch)) {
                throw new \Exception('cURL Error: ' . curl_error($ch));
            }

            // Close cURL session
            curl_close($ch);

            // Decode the JSON response to an associative array
            $response = json_decode($response, true);

            // Check if decoding was successful
            if ($response === null) {
                throw new Exception('Request was not successful.');
            }

            // Check for success
            if (isset($response['respCode']) && $response['respCode'] === '00000000') {

                $res =  DB::table('virtual_accounts')->insert([
                    'user_id' => $loginUserId,
                    'accountReference' => $response['data']['accountReference'],
                    'accountNo' => $response['data']['virtualAccountNo'],
                    'accountName' => $response['data']['virtualAccountName'],
                    'bankName' => 'PalmPay',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Update user to indicate virtual account creation
                User::where('id', $loginUserId)->update(['vwallet_is_created' => 1]);
            }
        } catch (\Exception $e) {
            Log::error('Error creating virtual account for user ' . $loginUserId . ': ' . $e->getMessage());

            return response()->json(['error' => 'Failed to create virtual account.'], 500);
        }
     }
    }
}
