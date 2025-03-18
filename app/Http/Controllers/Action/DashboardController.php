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

        // Create Main Wallet Account
        $walletRepo = new WalletRepository();
        $walletRepo->createWalletAccount($this->loginUserId);


        $virtual_accounts = Virtual_Accounts::where('status', 1)
            ->where('user_id', $this->loginUserId)
            ->take(2)
            ->get();

        $wallet_balance = Wallet::where('user_id', $this->loginUserId)->value('balance') ?? 0;
        $bonus_balance = Bonus::where('user_id', $this->loginUserId)->value('deposit') ?? 0;

        // Get all transactions and counts
        $transactions = Transaction::where('user_id', $this->loginUserId)
            ->orderByDesc('id')
            ->paginate(10);

        $transaction_count = Transaction::where('user_id', $this->loginUserId)->count();

        // Get news and notes
        $newsItems = News::all();
        $note = Notes::where('is_active', 1)->first();

        $notificationsEnabled = Auth::user()->notification;

        return view('dashboard', [
            'note' => $note,
            'newsItems' => $newsItems,
            'transactions' => $transactions,
            'transaction_count' => $transaction_count,
            'bonus_balance' => $bonus_balance,
            'wallet_balance' => $wallet_balance,
            'virtual_accounts' => $virtual_accounts,
            'notifications' => $notifications,
            'notifyCount' => $notifyCount,
            'notificationsEnabled' =>  $notificationsEnabled,
        ]);
    }
}
