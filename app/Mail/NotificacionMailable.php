<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NotificacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $user = Auth::user();

        return $this->subject($this->data['subject'])
            ->view('mail.notificacion')
            ->with($this->data)
            ->bcc($user->email);
    }
}
