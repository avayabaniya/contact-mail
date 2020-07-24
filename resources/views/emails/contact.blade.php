@component('mail::message')
# Contact us email

<b>NAME:</b> {{ $message->name }}

<b>EMAIL:</b> {{ $message->email }}

<b>NUMBER:</b> {{ $message->number }}

<b>SUBJECT:</b> {{ $message->subject }}

<b>MESSAGE:</b><br>
{{ $message->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
