<?php


namespace avayabaniya\ContactMailer;


use avayabaniya\ContactMailer\Exceptions\ContactMessageMailException;
use avayabaniya\ContactMailer\Exceptions\ContactMessageModelException;
use Illuminate\Database\Eloquent\Model;

class ContactMailer
{
    public function model()
    {
        $model = config('contact-mailer.model');
        if (class_exists($model)) {
            //if ($model instanceof Model) {
                return new $model;
            //}
        }

        throw new ContactMessageModelException('Model to save messages to database not found. Verify the model in config file');
    }

    public function mailReceiverEmail()
    {
        return config('contact-mailer.receiver');
    }

    public function mailable()
    {
        $mailable = config('contact-mailer.mailable');
        if (class_exists($mailable)) {
            //if ($mailable instanceof \Illuminate\Mail\Mailable) {
                return $mailable;
            //}
        }

        throw new ContactMessageMailException('Mailable to send mail not found. Verify the mailable class in config file');
    }
}