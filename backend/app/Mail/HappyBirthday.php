<?php

namespace App\Mail;

use App\Models\Reader;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HappyBirthday extends Mailable
{
    use Queueable, SerializesModels;

    protected $reader;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reader)
    {
        $this->reader = $reader;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('victornogu80@gmail.com', 'Victor Nogueira')
            ->view('emails.birthday');
    }
}
