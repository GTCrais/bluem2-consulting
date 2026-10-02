<?php

namespace App\Http\Requests;

use App\Services\ContactMessageService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactMessageStoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * The "website" field is a honeypot: it is hidden on the contact form, so only bots fill it in.
	 *
	 * @return array<string, ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:150'],
			'email' => ['required', 'string', 'email', 'max:255'],
			'project_type' => ['nullable', 'string', Rule::in(ContactMessageService::PROJECT_TYPES)],
			'message' => ['required', 'string', 'max:5000'],
			'website' => ['prohibited']
		];
	}
}
