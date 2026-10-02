<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
	use SerializesModels;

	/**
	 * Create a new message instance. The message text is called "messageBody" because
	 * mail views reserve the $message variable for the message being built.
	 */
	public function __construct(
		public string $senderName,
		public string $senderEmail,
		public ?string $projectType,
		public string $messageBody
	) {}

	/**
	 * Get the message envelope. Replies go straight back to the person who reached out.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			replyTo: [new Address($this->senderEmail, $this->senderName)],
			subject: config('app.name') . ' - New contact message from ' . $this->senderName,
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content
	{
		return new Content(
			view: 'mail.contactMessage',
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, Attachment>
	 */
	public function attachments(): array
	{
		return [];
	}
}
