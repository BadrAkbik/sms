<?php

namespace App\Notifications;

use App\Models\EmailVerificationCode;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmail extends Notification
{
    use Queueable;

    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())->view('mail.mail', ['code' => (string) $this->generateCode($notifiable), 'notifibale' => $notifiable, 'type' => 'email verification']);
    }


    public function generateCode($notifiable)
    {
        EmailVerificationCode::where('email', $notifiable->email)->delete();
        $data['email'] = $notifiable->email;
        $data['code'] = mt_rand(100000, 999999);
        EmailVerificationCode::create($data);
        return $data['code'];
    }
}
