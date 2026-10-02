<?php

namespace App\Http\Controllers;

use App\Services\ViewMetadataProviderService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
	public function show(Request $request, ViewMetadataProviderService $viewMetadataProviderService, $slug = null)
	{
		if (!$slug) {
			$viewMetadataProviderService->setTitle('BlueM2 Consulting');

			return Inertia::render('Home');
		}

		if ($slug == 'sitemap') {
			return response()
				->view('sitemap', [
					'lastPageEdit' => '2026-01-01T00:00:00+00:00'
				])
				->header('Content-Type', 'application/xml');
		}

		abort(404);
    }
}
