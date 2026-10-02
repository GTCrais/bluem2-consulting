<?php

use Inertia\Testing\AssertableInertia as Assert;

it('renders the home page with the project types offered on the contact form', function () {
    $response = $this->get('/');

    $response->assertInertia(fn (Assert $page) => $page
        ->component('Home')
        ->where('projectTypes', ['Webshop', 'Business application', 'Website', 'Something else'])
    );
});
