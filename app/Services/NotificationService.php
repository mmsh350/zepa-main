<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public function createNotification($userId, $title, $message)
    {
        return Notification::create([
            'user_id' => $userId,
            'message_title' => $title,
            'messages' => $message,
        ]);
    }

    public function getUserNotifications($userId)
    {
        return Notification::where('user_id', $userId)->latest()->get();
    }

    public function markAsRead($notificationId)
    {
        return Notification::where('id', $notificationId)->update(['is_read' => true]);
    }
}
