<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Titulación extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $agenda;
    private $reply;

    public function __construct($agenda)
    {
        $this->agenda = $agenda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail', ['agenda' => $this->agenda])
            ->replyTo([$this->agenda->alumno_email], "alumno");
    }
}
