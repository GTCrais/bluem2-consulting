<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageStoreRequest;
use App\Services\ContactMessageService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class ContactMessageController extends Controller
{
	public function store(ContactMessageStoreRequest $request, ContactMessageService $contactMessageService): RedirectResponse
	{
		$contactMessageService->sendContactMessage($request);

		Inertia::flash('contactMessageSent', true);

		return back();
	}
}
