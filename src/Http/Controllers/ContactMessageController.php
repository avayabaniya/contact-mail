<?php


namespace avayabaniya\ContactMailer\Http\Controllers;


use avayabaniya\ContactMailer\Facades\ContactMailer;
use avayabaniya\ContactMailer\Mail\ContactMessageMail;
use avayabaniya\ContactMailer\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactMessageController extends Controller
{

    public function sendContactMessage(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validateData->fails()) {
            return response()->json(['error' => $validateData->errors()->all()]);
        }


        $message = ContactMailer::model()->create($request->all());
        $email = ContactMailer::mailReceiverEmail();
        $mailable = ContactMailer::mailable();

        Mail::to($email)->send(new $mailable($message));

        return response()->json(['success' => 'Contact message sent successfully.']);
    }

    public function contactFormExample()
    {
        return view('contact_form_example');
    }
}