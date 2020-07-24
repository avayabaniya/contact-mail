<?php


namespace avayabaniya\ContactMailer\Providers;


use Illuminate\Support\ServiceProvider;

class ContactMailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
        $this->registerResources();
    }

    public function register()
    {
        
    }

    private function registerResources()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/2020_07_23_000000_create_contact_messages_table.php');
        $this->loadViewsFrom(__DIR__. '/../../resources/views', 'contactmailer');
        $this->registerFacades();
    }

    private function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../../config/contact-mailer.php' => config_path('contact-mailer.php')
        ], 'contact-message-config');

        $this->publishes([
            __DIR__ . '/../../public/contact_mail/js/contact-message.stub' => base_path('public/contact_mail/js/contact-message.js')
        ], 'contact-message-js');

        $this->publishes([
            __DIR__.'/../../resources/views/contact_form_example.blade.php' => base_path('resources/views/contact_form_example.blade.php')
        ], 'contact-message-form');
    }

    private function registerFacades()
    {
        $this->app->singleton('ContactMailer', function ($app) {
            return new \avayabaniya\ContactMailer\ContactMailer();
        });
    }
}