<?php

use App\Mail\ContactMessage as ContactMessageMail;
use App\Notifications\ContactMessage;
use Illuminate\Notifications\AnonymousNotifiable;

it('emails the contact message to the inbox it was routed to', function () {
    $notification = new ContactMessage(
        senderName: 'Jane Doe',
        senderEmail: 'jane@example.com',
        projectType: 'Webshop',
        messageBody: 'We would like to start selling our products online.',
    );

    $mail = $notification->toMail((new AnonymousNotifiable)->route('mail', 'inbox@bluem2.test'));

    $mail->assertTo('inbox@bluem2.test');
    expect($mail)
        ->toBeInstanceOf(ContactMessageMail::class)
        ->senderName->toBe('Jane Doe')
        ->senderEmail->toBe('jane@example.com')
        ->projectType->toBe('Webshop')
        ->messageBody->toBe('We would like to start selling our products online.');
});
