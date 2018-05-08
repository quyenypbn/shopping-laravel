<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $bills;
    public $billdetail;
    public function __construct($bills,$billdetail)
    {
        $this->bills = $bills;
        $this->billdetail = $billdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nguyenthiquyen.conan@gmail.com')->view('mail.invoice');
    }
}
