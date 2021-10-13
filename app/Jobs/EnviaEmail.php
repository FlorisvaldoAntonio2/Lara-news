<?php

namespace App\Jobs;

use App\Mail\EmailConfirmacaoPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EnviaEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $usuario;
    private $noticia;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user , $noticia)
    {
        $this->usuario = $user;
        $this->noticia = $noticia;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send(new EmailConfirmacaoPost($this->usuario , $this->noticia));
    }
}
