<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $ad;
     protected $email;
     protected $mesaj;

    public function __construct($ad,$email,$mesaj)
    {
        $this->ad = $ad;
        $this->email = $email;
        $this->mesaj = $mesaj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.mail.email')
        ->with([
            'ad' => $this->ad,
            'email' => $this->email,
            'mesaj' => $this->mesaj
        ])->subject('CRR Contact');
    }
}
