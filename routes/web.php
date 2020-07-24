<?php


use avayabaniya\ContactMailer\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;

Route::post('/send-contact-message', [ContactMessageController::class, 'sendContactMessage'])->name('send.contact.message');
Route::get('/contact-form-example', [ContactMessageController::class, 'contactFormExample'])->name('contact.form.example');