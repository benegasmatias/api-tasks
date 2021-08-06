<?php

namespace App\Mail\plantilla;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\PasswordReset;


class Plant_cambioPassword extends Mailable
{
  use Queueable, SerializesModels;

  protected  $user;
  protected  $resetPass;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(User $user,PasswordReset $resetPass)
  {
    $this->user = $user;
    $this->resetPass = $resetPass;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $subject = "Asunto del correo Laravel -_-"; //asunto
    $fromEmail= "e@e.com"; //no lo emanara al correo por X motivo
    $fromName= "Laravel :D"; //nombre de quien lo manda
    $replyToEmail = "e2@e.com"; //correo para q responda

    return $this->view('mails.plantilla.codigoAutenticacion')
    ->from($fromEmail, $fromName)
    ->subject($subject)
    ->replyTo($replyToEmail);
  }
}
