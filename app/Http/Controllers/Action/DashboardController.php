<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\News;
use App\Models\Notes;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\Virtual_Accounts;
use App\Models\Wallet;
use App\Repositories\VirtualAccountRepository;
use App\Repositories\WalletRepository;
use App\Traits\ActiveUsers;
use App\Traits\KycVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use ActiveUsers;
    use KycVerify;

    //Show Dashboard
    public function show(Request $request)
    {
        //Login User Id
        $loginUserId = Auth::id();

        //Check if user is Disabled
        if ($this->is_active() != 1) {
            Auth::logout();

            return view('error');
        }

        //Check if user is Pending, Rejected, or Verified KYC
        $status = $this->is_verified();

        if ($status == 'Pending') {
            return redirect()->route('verification.kyc');

        } elseif ($status == 'Submitted') {
            return view('kyc-status')->with(compact('status'));

        } elseif ($status == 'Rejected') {
            return view('kyc-status')->with(compact('status'));
        } else {

            //Notification Data
            $notifications = Notification::all()->where('user_id', $loginUserId)
                ->sortByDesc('id')
                ->where('status', 'unread')
                ->take(3);

            //Notification Count
            $notifycount = 0;
            $notifycount = Notification::all()
                ->where('user_id', $loginUserId)
                ->where('status', 'unread')
                ->count();

            //Create Virtual Account
            $repObj = new VirtualAccountRepository();
            $response = $repObj->createVirtualAccount($loginUserId);

            //Create Main Wallet Account
            $repObj2 = new WalletRepository();
            $response = $repObj2->createWalletAccount($loginUserId);

            //Return all Virtual Accounts
            $virtaul_accounts = Virtual_Accounts::all()->where('status',1)->where('user_id', $loginUserId)->take(2);

            //Return Wallet and Bonus Balance
            $wallet = Wallet::where('user_id', $loginUserId)->first();
            $wallet_balance = $wallet->balance;

            $bonus = Bonus::where('user_id', $loginUserId)->first();
            $bonus_balance = $bonus->deposit;

            //Get all transactions and counts

            $transactions = Transaction::where('user_id', $loginUserId)
                ->orderBy('id', 'desc')
                ->paginate(10);
            $transaction_count = Transaction::all()
                ->where('user_id', $loginUserId)
                ->count();

            //Get news 
            $newsItems = News::all();

            //Get Notes 
            $note = Notes::where('is_active', 1)->first();

            return view('dashboard')
                ->with(compact('note'))
                ->with(compact('newsItems'))
                ->with(compact('transactions'))
                ->with(compact('transaction_count'))
                ->with(compact('bonus_balance'))
                ->with(compact('wallet_balance'))
                ->with(compact('virtaul_accounts'))
                ->with(compact('notifications'))
                ->with(compact('notifycount'));
        }
    }
}
