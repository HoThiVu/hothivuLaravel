<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendbill extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //view ở đây là trang chứa các thông tin mình muốn hiển thị

        return $this->subject('It is your bill')->replyTo('davien04@gmail.com', 'Dan Linh')->view('emails.mail-notify', [
    'data' => $this->data
 
    ]);
    }
}
