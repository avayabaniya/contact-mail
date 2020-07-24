<?php

use avayabaniya\ContactMailer\Models\ContactMessage;

return [
    'model' => ContactMessage::class,

    'receiver' => env('CONTACT_MAIL_RECEIVER', 'baniyaavaya@gmail.com'),

];