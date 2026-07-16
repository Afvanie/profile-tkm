<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $contactData;

    public function __construct(array $contactData)
    {
        $this->contactData = $contactData;
    }

    public function build()
    {
        return $this
            ->replyTo($this->contactData['email'], $this->contactData['name'])
            ->subject('Pesan Kontak Website D-III Teknik Mesin')
            ->view('emails.contact-form');
    }
}