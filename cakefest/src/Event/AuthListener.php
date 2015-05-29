<?php
namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;

class AuthListener implements EventListenerInterface
{
    public function implementedEvents() {
        return array(
            'Auth.loginFailed' => 'loginFailedLog',
        );
    }

    public function loginFailedLog($event, $ip) {

        Log::info(__('Suspicious activity, login failed: {0}', $ip));
    }
}
