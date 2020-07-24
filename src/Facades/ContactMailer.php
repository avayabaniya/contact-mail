<?php


namespace avayabaniya\ContactMailer\Facades;


use Illuminate\Support\Facades\Facade;

class ContactMailer extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'ContactMailer';
    }
}