<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\UserRegistered;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Services\Notification\Notification;
use App\Models\User;
use App\Mail\TopicCreated;

Route::get('/', function () {
    $notification = resolve(Notification::class);
    // $notification->sendEmail(User::find(1), new TopicCreated);
    $notification->sendSms(User::find(1), 'این یک پیام تستی میباشد.');

});
