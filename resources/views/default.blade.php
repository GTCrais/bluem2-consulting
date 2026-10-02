<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<meta name="twitter:card" content="summary">
		<meta property="og:image:width" content="1200" />
		<meta property="og:image:height" content="630" />
		<meta property="fb:app_id" content="{{ $facebookAppId }}" />

		<link rel="icon" type="image/x-icon" href="/img/logos/favicon.png">

		@if (config('services.fathom.active'))
			<script src="https://cdn.usefathom.com/script.js" data-site="" defer></script>
		@endif

		@vite(['resources/css/app.css', 'resources/js/app.js'])

		<x-inertia::head>
			<title data-inertia>{{ $metadataProvider->getTitle() }}</title>

			<meta name="twitter:title" content="{{ $metadataProvider->getTitle() }}" data-inertia />
			<meta name="twitter:description" content="{{ $metadataProvider->getDescription() }}" data-inertia />
			<meta name="twitter:image" content="{{ $metadataProvider->getTwitterImage() }}" data-inertia />

			<meta name="description" content="{{ $metadataProvider->getDescription() }}" data-inertia />
			<meta name="keywords" content="{{ $metadataProvider->getKeywords() }}" data-inertia />
			<link rel="canonical" href="{{ $metadataProvider->getCanonicalUrl() }}" data-inertia />

			<meta property="og:url" content="{{ $metadataProvider->getCanonicalUrl() }}" data-inertia />
			<meta property="og:type" content="{{ $metadataProvider->getOgType() }}" data-inertia />
			<meta property="og:title" content="{{ $metadataProvider->getTitle() }}" data-inertia />
			<meta property="og:description" content="{{ $metadataProvider->getDescription() }}" data-inertia />
			<meta property="og:image" content="{{ $metadataProvider->getOgImage() }}" data-inertia />
		</x-inertia::head>
	</head>

	<body>
		<x-inertia::app />
	</body>
</html>