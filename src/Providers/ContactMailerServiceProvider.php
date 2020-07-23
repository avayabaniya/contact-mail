<?php


namespace avayabaniya\ContactMailer\Providers;


use Illuminate\Support\ServiceProvider;

class ContactMailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerResources();
    }

    public function register()
    {
        
    }

    private function registerResources()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/2020_07_23_000000_create_contact_messages_table.php');
    }
}