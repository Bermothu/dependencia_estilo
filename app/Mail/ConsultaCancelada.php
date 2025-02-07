<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Consulta;

class ConsultaCancelada extends Mailable
{
    use Queueable, SerializesModels;

    
    public $consulta;

    /**
     * Create a new message instance.
     *
     * @param Consulta $consulta
     */
    public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->view('emails.consulta_cancelada')
                    ->subject('Consulta Cancelada')
                    ->with([
                        'titulo' => $this->consulta->title,
                        'nomeUsuario' => $this->consulta->user->name,
                        'data' => \Carbon\Carbon::parse($this->consulta->data)->format('d/m/Y'),
                        'horario' => $this->consulta->horario,
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Consulta Cancelada!',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
