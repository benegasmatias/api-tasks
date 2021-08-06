<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\PasswordReset;


class coderCambioPassword extends Mailable
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
    $subject = "Recuperación de contraseña"; //asunto
    $fromEmail= ""; //no lo emanara al correo por X motivo
    $fromName= "Creando Academia"; //nombre de quien lo manda
    $replyToEmail = ""; //correo para q responda

    return $this->view('mails.coderCambioPassword')
    ->from($fromEmail, $fromName)
    ->subject($subject)
    ->replyTo($replyToEmail);
  }
}
