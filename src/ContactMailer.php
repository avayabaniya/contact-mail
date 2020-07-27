<?php


namespace avayabaniya\ContactMailer;


use avayabaniya\ContactMailer\Exceptions\ContactMessageMailException;
use avayabaniya\ContactMailer\Exceptions\ContactMessageModelException;
use avayabaniya\ContactMailer\Mail\ContactMessageMail;
use avayabaniya\ContactMailer\Models\ContactMessage;
use Illuminate\Database\Eloquent\Model;
use ReflectionClass;

class ContactMailer
{
    public function model()
    {
        $model = config('contact-mailer.model');
        if (empty($model)) return new ContactMessage();
        if (class_exists($model)) {
            $reflectorClass = new ReflectionClass($model);
            $model = $reflectorClass->newInstanceWithoutConstructor();
            if ($model instanceof Model) {
                return new $model;
            }
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

        if (empty($mailable)) {
            $reflectorClass = new ReflectionClass(ContactMessageMail::class);
            return $reflectorClass->newInstanceWithoutConstructor();
        }

        if (class_exists($mailable)) {
            $reflectorClass = new ReflectionClass($mailable);
            $mailable = $reflectorClass->newInstanceWithoutConstructor();
            if ($mailable instanceof \Illuminate\Mail\Mailable) {
                return $mailable;
            }
        }

        throw new ContactMessageMailException('Mailable to send mail not found. Verify the mailable class in config file');
    }
}