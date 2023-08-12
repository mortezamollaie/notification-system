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
use App\Http\Controllers\NotificationsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/notification/send-email', [NotificationsController::Class, 'email'])->name('notification.form.email');
