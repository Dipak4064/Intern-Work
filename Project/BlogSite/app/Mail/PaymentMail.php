<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $messageStatus;
    protected $name;
    protected $pid;
    protected $amount;
    protected $plan;

    public function __construct($name, $pid, $amount, $messageStatus, $plan)
    {
        $this->name = $name;
        $this->messageStatus = $messageStatus;
        $this->pid = $pid;
        $this->amount = $amount;
        $this->plan = $plan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.PaymentMail',
            with: [
                'name' => $this->name,
                'messageStatus' => $this->messageStatus,
                'pid' => $this->pid,
                'amount' => $this->amount,
                'plan' => $this->plan,
            ],
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
