<?php

use avayabaniya\ContactMailer\Mail\ContactMessageMail;
use avayabaniya\ContactMailer\Models\ContactMessage;

return [
    'model' => env('CONTACT_MAIL_MODEL', ContactMessage::class),

    'receiver' => env('CONTACT_MAIL_RECEIVER', 'baniyaavaya@gmail.com,baniyaavaya2@gmail.com'),

    'mailable' => env('CONTACT_MAIL_MAILABLE', ContactMessageMail::class)
];