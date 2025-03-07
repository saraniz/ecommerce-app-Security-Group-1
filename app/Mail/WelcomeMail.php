<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->from('stormprojects47@gmail.com', "Sixteen Clothing")
                    ->subject('🎉 Sixteen Clothing - Welcome Email Service! – ⚡️ [Do Not Reply]')
                    ->view('email.welcome_email') // Use the correct view path here
                    ->with('data', $this->data); // Pass the data to the view
    }
}
