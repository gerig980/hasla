<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail as Notification;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class VerifyEmail extends Notification
{
    protected function verificationUrl($notifiable)
    {
        $appUrl = config('app.client_url', config('app.url'));

        $url = URL::temporarySignedRoute(
            'api.v1.verification.user', 
            Carbon::now()->addMinutes(60), 
            ['user' => $notifiable->id]
        );

        return str_replace(url('/api/v1'), $appUrl, $url);
    }
}
