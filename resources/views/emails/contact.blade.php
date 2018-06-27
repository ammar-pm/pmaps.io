@component('mail::message')
# Our team will be in touch.

Thanks {{ $message->name }} for your interest!

Email: {{ $message->email }}<br>
Phone: {{ $message->phone }}<br>
Comments: {{ $message->comments }}<br>

Best,<br>
{{ config('app.name') }}<br>
{{ env('APP_URL') }}
@endcomponent