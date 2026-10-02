<?php

use App\Notifications\ContactMessage;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

it('sends the contact message to the agency inbox and flashes a confirmation', function () {
    config(['mail.contact.address' => 'inbox@bluem2.test']);
    Notification::fake();

    $response = $this->from('/')->post('/contact', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'project_type' => 'Webshop',
        'message' => 'We would like to start selling our products online.',
    ]);

    $response->assertRedirect('/')
        ->assertSessionHasNoErrors()
        ->assertInertiaFlash('contactMessageSent', true);
    Notification::assertSentOnDemand(ContactMessage::class, function (ContactMessage $notification, array $channels, AnonymousNotifiable $notifiable) {
        return $notifiable->routes['mail'] === 'inbox@bluem2.test'
            && $notification->senderName === 'Jane Doe'
            && $notification->senderEmail === 'jane@example.com'
            && $notification->projectType === 'Webshop'
            && $notification->messageBody === 'We would like to start selling our products online.';
    });
});

it('rejects a contact message without a name, an email address or a message', function () {
    Notification::fake();

    $response = $this->from('/')->post('/contact', []);

    $response->assertRedirect('/')
        ->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'email' => 'The email field is required.',
            'message' => 'The message field is required.',
        ])
        ->assertInertiaFlashMissing('contactMessageSent');
    Notification::assertNothingSent();
});

it('rejects a contact message with invalid input', function (array $input, string $field, string $error) {
    Notification::fake();

    $response = $this->from('/')->post('/contact', [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'message' => 'We would like to start selling our products online.',
        ...$input,
    ]);

    $response->assertRedirect('/')
        ->assertSessionHasErrors([$field => $error])
        ->assertInertiaFlashMissing('contactMessageSent');
    Notification::assertNothingSent();
})->with([
    'an invalid email address' => [['email' => 'jane-at-example'], 'email', 'The email field must be a valid email address.'],
    'a project type the form does not offer' => [['project_type' => 'Crypto mining'], 'project_type', 'The selected project type is invalid.'],
    'the hidden honeypot field filled in' => [['website' => 'https://spam.example'], 'website', 'The website field is prohibited.'],
]);

it('returns 429 when the contact form is submitted more than three times a minute', function () {
    Notification::fake();
    $contactMessage = [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'message' => 'We would like to start selling our products online.',
    ];
    $this->from('/')->post('/contact', $contactMessage);
    $this->from('/')->post('/contact', $contactMessage);
    $this->from('/')->post('/contact', $contactMessage);

    $response = $this->from('/')->post('/contact', $contactMessage);

    $response->assertTooManyRequests();
    Notification::assertSentOnDemandTimes(ContactMessage::class, 3);
});
