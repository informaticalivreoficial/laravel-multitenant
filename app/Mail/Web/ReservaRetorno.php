<?php

namespace App\Mail\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

class ReservaRetorno extends Mailable
{
    use Queueable, SerializesModels;

    private $retorno;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $retorno)
    {
        $this->retorno = $retorno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->retorno['clisiteemail'], $this->retorno['sitename'])
            ->to($this->retorno['reply_email'], $this->retorno['reply_name'])
            ->from($this->retorno['siteemail'], $this->retorno['sitename'])
            ->subject('✔️ Pré-reserva: ' . $this->retorno['sitename'])
            ->markdown('emails.reserva-retorno', [
                'nome' => $this->retorno['reply_name'],
                'sitename' => $this->retorno['sitename']
        ]);
    }
}
