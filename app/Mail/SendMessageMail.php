<?php

namespace App\Mail;

use Illuminate\Mail\Attachment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMessageMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $mailData;

    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['subject'],
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'mails.sendMail',
        );
    }

    public function attachments(): array
    {
        $attachmentsFiles = [];

        if (!empty($this->mailData['files'])) {
            foreach ($this->mailData['files'] as $file) {
                $attachmentsFiles[] = Attachment::fromStorage($file);
            }
        }

        return $attachmentsFiles;
    }
}
