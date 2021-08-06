<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class reguistradoProfesor extends Mailable
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
    $subject = "Se te a registrado como profesor en Creando Academia"; //asunto
    $fromEmail= ""; //no lo emanara al correo por X motivo
    $fromName= "Creando Academia"; //nombre de quien lo manda
    $replyToEmail = ""; //correo para q responda

    return $this->view('mails.codigoAutenticacion')
    ->from($fromEmail, $fromName)
    ->subject($subject)
    ->replyTo($replyToEmail);
  }
}
