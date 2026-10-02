<?php

namespace App\Services;

use App\Http\Requests\ContactMessageStoreRequest;
use App\Notifications\ContactMessage;
use Illuminate\Support\Facades\Notification;

class ContactMessageService
{
	/**
	 * The kinds of projects a visitor can pick on the contact form.
	 *
	 * @var list<string>
	 */
	public const PROJECT_TYPES = [
		'Webshop',
		'Business application',
		'Website',
		'Something else'
	];

	/**
	 * Delivers a message from the website's contact form to the agency's inbox.
	 */
	public function sendContactMessage(ContactMessageStoreRequest $request): void
	{
		Notification::route('mail', config('mail.contact.address'))
			->notify(new ContactMessage(
				senderName: $request->validated('name'),
				senderEmail: $request->validated('email'),
				projectType: $request->validated('project_type'),
				messageBody: $request->validated('message')
			));
	}
}
