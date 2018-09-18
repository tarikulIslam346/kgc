<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $fname ;
    public $phone;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fname,$phone,$text )
    {
        //
        $this->fname = $fname;
        $this->phone = $phone;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome');
    }
}
