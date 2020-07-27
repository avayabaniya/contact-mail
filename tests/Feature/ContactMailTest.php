<?php


namespace avayabaniya\ContactMailer\Tests\Feature;


use avayabaniya\ContactMailer\Facades\ContactMailer;
use avayabaniya\ContactMailer\Mail\ContactMessageMail;
use avayabaniya\ContactMailer\Models\ContactMessage;
use avayabaniya\ContactMailer\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

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


    /** @test **/
    public function send_contact_message_mail()
    {
        $this->post(route('send.contact.message'), [
            'name' => 'Avaya Baniya',
            'number' => '9860089363',
            'email' => 'baniyaavaya@gmail.com',
            'subject' => 'Contact message mail',
            'message' => 'test'
        ]);

        Mail::fake();
        $message = ContactMessage::first();

        $mail = ContactMailer::mailReceiverEmail();
        Mail::to($mail)->send(new ContactMessageMail($message));

        Mail::assertSent(ContactMessageMail::class, function ($mail) use ($message) {
            return $mail->message->email == $message->email && $mail->message->number == $message->number;
        });
    }

    /** @test **/
    public function send_contact_message_mail_from_config()
    {
        $this->post(route('send.contact.message'), [
            'name' => 'Avaya Baniya',
            'number' => '9860089363',
            'email' => 'baniyaavaya@gmail.com',
            'subject' => 'Contact message mail',
            'message' => 'test'
        ]);

        Mail::fake();

        $message = ContactMailer::model()->first();
        $mail = ContactMailer::mailReceiverEmail();
        $mailable = ContactMailer::mailable();
        $mailerNamespace = config('contact-mailer.mailable');

        Mail::to($mail)->send(new $mailable($message));

        Mail::assertSent($mailerNamespace, function ($mail) use ($message) {
            return $mail->message->email == $message->email && $mail->message->number == $message->number;
        });
    }
}