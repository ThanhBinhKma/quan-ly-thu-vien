<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user ;
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
    // dd( 'http:://' . request()->getHost() . '/' . '/confirm_regiester/');
    public function build()
    {
        $email = base64_encode($this->data['user']->email);
        $id = base64_encode($this->data['user']->id);
        $code = base64_encode($this->data['codeMail']->code);
        $url = 'http://' . request()->getHost() . ':8000' . '/' . '/confirm_register/' . $email . '/' . $id . '/' . $code ;

        return $this->view('mail.register')->with(['url' => $url]);;
    }
}
