<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailForgetUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = base64_encode($this->data['email']);
        $code = base64_encode($this->data['code']);
        $url = 'http://' . request()->getHost() . ':8000' . '/' . 'reset_password/' . $email . '/' . $code ;

        return $this->view('mail.register')->with(['url' => $url]);;
    }
}
