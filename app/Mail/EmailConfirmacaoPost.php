<?php

namespace App\Mail;

use App\Models\noticia;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class EmailConfirmacaoPost extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $noticia;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user , noticia $noticia)
    {
        $this->user = $user;
        $this->noticia = $noticia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Nova noticia!');
        //$this->to('seu email', 'seu nome'); <--- email e nome
        $this->to('florisvaldoantonio2@gmail.com', 'flor');
        return $this->markdown('email/EmailConfirmacaoPost', ['user' => $this->user , 'noticia' => $this->noticia]);
    
    }
}
