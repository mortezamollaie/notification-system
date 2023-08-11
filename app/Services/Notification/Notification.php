<?php
namespace App\Services\Notification;

use App\Services\Notification\Providers\EmailProvider;
use App\Services\Notification\Providers\SmsProvider;
use App\Services\Notification\Providers\Contracts\Provider;

/**
 * @method sendSms(App\Models\User $user, String $text)
 * @method sendEmail(App\Models\User $user, Mailable $mailable)
 */

class Notification{
    public function __call($method, $arguments){
        $providerPath =__NAMESPACE__ . '\Providers\\' . substr($method, 4) . 'Provider';
        if(!class_exists($providerPath)){
            throw new \Exception('Class does not exist');
        }
        $providerInstance = new $providerPath( ...$arguments);
        if(!is_subclass_of($providerInstance, Provider::class)){
            throw new \Exception('class must implements \App\Services\Notification\Providers\Contracts\Provider');
        };
        return $providerInstance->send();
    }
}