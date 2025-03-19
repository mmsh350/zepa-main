<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Notes;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\VirtualAccount;
use App\Models\Wallet;
use App\Repositories\VirtualAccountRepository;
use App\Repositories\WalletRepository;
use App\Traits\ActiveUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use ActiveUsers;

    protected $loginUserId;


    public function __construct()
    {
        $this->loginUserId = Auth::id();
    }

    public function show(Request $request)
    {
        // Enhance later via middleware
        if ($this->is_active() != 1) {
            Auth::logout();
            return view('error');
        }

        $notifications = Notification::where('user_id', $this->loginUserId)
            ->where('status', 'unread')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $notifyCount = $notifications->count();

        $this->createAccounts($this->loginUserId);

        $virtual_accounts = VirtualAccount::where('status', '1')
            ->where('user_id', $this->loginUserId)
            ->take(2)
            ->get();

        $wallet_balance = Wallet::where('user_id', $this->loginUserId)->value('balance') ?? 0;

        $bonus_balance = Wallet::where('user_id', $this->loginUserId)->value('bonus') ?? 0;

        $transactions = Transaction::where('user_id', $this->loginUserId)
            ->orderByDesc('id')
            ->paginate(10);

        $transaction_count = Transaction::where('user_id', $this->loginUserId)->count();

        $newsItems = News::all();

        $note = Notes::where('is_active', 1)->first();

        $notificationsEnabled = Auth::user()->notification;

        $virtual_funding = DB::table('service_statuses')->where('service_id', 5)->first();

        return view('dashboard', [
            'note' => $note,
            'newsItems' => $newsItems,
            'transactions' => $transactions,
            'transaction_count' => $transaction_count,
            'bonus_balance' => number_format($bonus_balance, 2),
            'wallet_balance' => number_format($wallet_balance, 2),
            'virtual_accounts' => $virtual_accounts,
            'notifications' => $notifications,
            'notifyCount' => $notifyCount,
            'notificationsEnabled' =>  $notificationsEnabled,
            'virtual_funding' => $virtual_funding,
        ]);
    }

    private function createAccounts($userId)
    {

        $repObj = new WalletRepository;
        $repObj->createWalletAccount($userId);

        // $repObj2 = new VirtualAccountRepository;
        // $repObj2->createVirtualAccount($userId);
    }
}
