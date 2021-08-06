<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class bienvenidaCreando extends Mailable
{
  use Queueable, SerializesModels;

  protected  $user;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $subject = "Bienvenido a Creando Academia"; //asunto
    $fromEmail= ""; //no lo emanara al correo por X motivo
    $fromName= "Creando Academia"; //nombre de quien lo manda
    $replyToEmail = ""; //correo para q responda

    return $this->view('mails.bienvenidaCreando')
    ->from($fromEmail, $fromName)
    ->subject($subject)
    ->replyTo($replyToEmail);
  }
}
