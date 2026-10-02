<?php

namespace App\Notifications;

use App\Notifications\Concerns\SerializesWithAppUrl;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;

class ContactMessage extends Notification implements ShouldQueue
{
	use Queueable, SerializesWithAppUrl;

	public $tries = 3;
	public $timeout = (2 * 60); // 2 minutes
	public $failOnTimeout = true;

	public function __construct(
		public string $senderName,
		public string $senderEmail,
		public ?string $projectType,
		public string $messageBody
	) {}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via(object $notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(object $notifiable): Mailable
	{
		return new \App\Mail\ContactMessage(
			senderName: $this->senderName,
			senderEmail: $this->senderEmail,
			projectType: $this->projectType,
			messageBody: $this->messageBody
		)->to($notifiable->routeNotificationFor('mail'));
	}

	/**
	 * @return array<string, string>
	 */
	public function viaQueues(): array
	{
		return [
			'mail' => config('queue.map.mail')
		];
	}

	/**
	 * @return array<int, int>
	 */
	public function backoff(): array
	{
		return [30, 60];
	}
}
