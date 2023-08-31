<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserRegistered;

use App\Services\Notification\Notification;
use App\Models\User;
use App\Mail\TopicCreated;
use App\Http\Controllers\NotificationsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/notification/send-email', [NotificationsController::Class, 'email'])->name('notification.form.email');

Route::post('/notification/send-email', [NotificationsController::Class, 'sendEmail'])->name('notification.send.email');

Route::get('/notification/send-sms', [NotificationsController::Class, 'sms'])->name('notification.form.sms');

Route::post('/notification/send-sms', [NotificationsController::Class, 'sendSms'])->name('notification.send.sms');