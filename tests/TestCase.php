<?php


namespace avayabaniya\ContactMailer\Tests;


use avayabaniya\ContactMailer\Mail\ContactMessageMail;
use avayabaniya\ContactMailer\Models\ContactMessage;
use avayabaniya\ContactMailer\Providers\ContactMailerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ContactMailerServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('contact-mailer.model', ContactMessage::class);
        $app['config']->set('contact-mailer.receiver', 'baniyaavaya@gmail.com');
        $app['config']->set('contact-mailer.mailable', ContactMessageMail::class);

        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections',
            [
                'mysql' => [
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => 3306,
                    'database' => 'package_db_logger',
                    'username' => 'root',
                    'password' => 'password',
                ]
            ]);
    }
}