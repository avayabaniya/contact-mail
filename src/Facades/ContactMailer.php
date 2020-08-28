<?php


namespace avayabaniya\ContactMailer\Facades;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Model model()
 * @method static string mailReceiverEmail()
 * @method static Mailable mailable()
 *
 * @see \avayabaniya\ContactMailer\ContactMailer
 */
class ContactMailer extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'ContactMailer';
    }
}