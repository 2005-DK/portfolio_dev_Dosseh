<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $subject_text;
    public $sender_name;
    public $sender_email;
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $name, $email, $messageText)
    {
        $this->subject_text = $subject;
        $this->sender_name = $name;
        $this->sender_email = $email;
        $this->message = $messageText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouveau message: ' . $this->subject_text,
            from: $this->sender_email,
            replyTo: $this->sender_email,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: [
                'subject_text' => $this->subject_text,
                'sender_name' => $this->sender_name,
                'sender_email' => $this->sender_email,
                'messageBody' => $this->message,
            ],
        );
    }
}
