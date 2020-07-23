<?php


namespace avayabaniya\ContactMailer\Http\Controllers;


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

        ContactMessage::create($request->all());
        $email = config('contact-mailer.receiver');

        //TODO: SEND MAIL

        return response()->json(['success' => 'Contact Send Successfully.']);

    }
}