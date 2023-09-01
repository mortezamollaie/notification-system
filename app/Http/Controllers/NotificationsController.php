<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Notification\Constants\EmailTypes;
use App\Services\Notification\Notification;

class NotificationsController extends Controller
{
    /**
     * show send email form
     */
    public function email(){
        $users = User::all();
        $emailTypes = EmailTypes::toString();
        return view('notification.send-email', compact('users', 'emailTypes'));
    }

    public function sendEmail(Request $request){
        $request->validate([
            'user' => 'integer|exists:users,id',
            'email_type' => 'integer'
        ]);

        try {
            $notification = resolve(Notification::Class);

        $mailable = EmailTypes::toMail($request->email_type);
        
        $notification->sendEmail(User::find($request->user) , new $mailable);

        return redirect()->back()->with('success', 'ایمیل با موفقیت ارسال شد');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'سرویس ایمیل با مشکل مواجه شده است ، لطفا دقایقی بعد سعی کنید.');
        }
    }

    public function sms(){
        $users = User::all();
        return view('notification.send-sms', compact('users'));
    }

    public function sendSms(Request $request, Notification $notification){
        $request->validate([
            'user' => 'integer | exists:users,id',
            'text' => 'string | max:256'
        ]);

        // $notification->sendSms(User::find($request->user), $request->text);

        return redirect()->back()->with('success', __('پیام کوتاه با موفقیت ارسال شد.'));
    }
}
