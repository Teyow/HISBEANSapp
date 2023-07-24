<?php

namespace App\Http\Controllers\modules\mobile;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllNotifications()
    {
        return Notification::all();
    }
}
