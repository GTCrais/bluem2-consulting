<?php

namespace App\Http\Controllers;

use App\Services\ContactMessageService;
use App\Services\ViewMetadataProviderService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
	public function show(Request $request, ViewMetadataProviderService $viewMetadataProviderService, $slug = null)
	{
		if (!$slug) {
			$viewMetadataProviderService->setTitle('BlueM2 Consulting');
			$viewMetadataProviderService->setDescription('BlueM2 Consulting is a web development agency from Zagreb, Croatia. We build fast, responsive websites, webshops and custom business applications, from the first idea to launch and beyond.');
			$viewMetadataProviderService->setKeywords('web development, web development agency, webshop development, eCommerce, custom business applications, web applications, CMS, Zagreb, Croatia');

			return Inertia::render('Home', [
				'projectTypes' => ContactMessageService::PROJECT_TYPES
			]);
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
