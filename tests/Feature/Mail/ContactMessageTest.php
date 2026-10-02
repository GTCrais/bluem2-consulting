<?php

use App\Mail\ContactMessage;

it('lets the agency reply straight to the sender', function () {
    config(['app.name' => 'BlueM2 Consulting']);

    $mail = new ContactMessage(
        senderName: 'Jane Doe',
        senderEmail: 'jane@example.com',
        projectType: 'Webshop',
        messageBody: 'We would like to start selling our products online.',
    );

    $mail->assertHasReplyTo('jane@example.com', 'Jane Doe')
        ->assertHasSubject('BlueM2 Consulting - New contact message from Jane Doe');
});

it('renders the sender details and keeps the line breaks of the message', function () {
    $mail = new ContactMessage(
        senderName: 'Jane Doe',
        senderEmail: 'jane@example.com',
        projectType: 'Business application',
        messageBody: "We need an internal tool.\nCan you help?",
    );

    $mail->assertSeeInOrderInHtml(['Jane Doe', 'jane@example.com', 'Business application'])
        ->assertSeeInHtml('We need an internal tool.<br />', false);
});

it('falls back to "Not specified" when no project type was chosen', function () {
    $mail = new ContactMessage(
        senderName: 'Jane Doe',
        senderEmail: 'jane@example.com',
        projectType: null,
        messageBody: 'We would like to start selling our products online.',
    );

    $mail->assertSeeInHtml('Interested in:</strong> Not specified', false);
});

it('escapes HTML in the sender name and message', function () {
    $mail = new ContactMessage(
        senderName: "Jane <script>alert('name')</script>",
        senderEmail: 'jane@example.com',
        projectType: null,
        messageBody: "<script>alert('message')</script>",
    );

    $html = $mail->render();

    expect($html)
        ->toContain('&lt;script&gt;')
        ->not->toContain('<script>');
});
