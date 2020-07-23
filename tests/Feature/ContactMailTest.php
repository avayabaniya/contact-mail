<?php


namespace avayabaniya\ContactMailer\Tests\Feature;


use avayabaniya\ContactMailer\Models\ContactMessage;
use avayabaniya\ContactMailer\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactMailTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function save_contact_message()
    {
        $this->post(route('send.contact.message'), [
            'name' => 'Avaya Baniya',
            'number' => '9860089363',
            'email' => 'baniyaavaya@gmail.com',
            'subject' => 'Contact message mail',
            'message' => 'test'
        ]);


        $this->assertCount(1, ContactMessage::all());
    }
}