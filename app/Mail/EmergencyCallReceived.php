<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Academia;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $academia;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Academia $academia)
    {
      $this->academia = $academia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.emergency_call.blade');
    }
}
