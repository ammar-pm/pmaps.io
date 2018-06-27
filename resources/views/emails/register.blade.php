@component('mail::message')
# A new user has signed up

@component('mail::button', ['url' => $url])
View User
@endcomponent

Name: {{ $user->name }}<br>
Email: {{ $user->email }}<br>
Phone: {{ $user->phone }}<br>
Usage: {{ $user->usage }}<br>

Best,<br>
{{ Config::get('site_name') }}<br>
{{ env('APP_URL') }}
@endcomponent