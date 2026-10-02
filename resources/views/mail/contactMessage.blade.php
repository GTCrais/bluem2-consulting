@extends('emailDefault')

@section('content')

	<h2>New contact message</h2>

	<p>
		Someone has just reached out through the contact form on the website.
	</p>

	<p class="with-bm">
		<strong>Name:</strong> {{ $senderName }}<br>
		<strong>Email:</strong> <a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a><br>
		<strong>Interested in:</strong> {{ $projectType ?? 'Not specified' }}
	</p>

	<p class="break-all">
		{!! nl2br(e($messageBody)) !!}
	</p>

	<p>
		Reply to this email to get back to {{ $senderName }} directly.
	</p>

@endsection
