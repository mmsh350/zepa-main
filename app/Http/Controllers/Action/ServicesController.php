<?php

namespace App\Http\Controllers\Action;



use App\Models\Notification;
use App\Traits\ActiveUsers;
use App\Traits\KycVerify;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use ActiveUsers;


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

        $notifications = Notification::where('user_id', $loginUserId)
            ->where('status', 'unread')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $notifyCount = Notification::where('user_id', $loginUserId)
            ->where('status', 'unread')
            ->count();

        $notificationsEnabled = Auth::user()->notification;

        $type = $request->name;

        return view('more-services', [
            'type' => $type,
            'notifications' => $notifications,
            'notifyCount' => $notifyCount,
            'notificationsEnabled' => $notificationsEnabled,
        ]);
    }
}
