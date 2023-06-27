<?php

namespace App\Notifications;

use App\Models\PasswordResetCode;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)->view('mail.mail', ['code' => (string) $this->generateCode(), 'notifibale' => $notifiable, 'type' => 'password reset']);
    }

    public function generateCode()
    {
        $this->data['code'] = mt_rand(100000, 999999);
        PasswordResetCode::create($this->data);
        return $this->data['code'];
    }
}