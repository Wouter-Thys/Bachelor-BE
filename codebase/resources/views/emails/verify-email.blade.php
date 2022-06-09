@component('mail::message')
# Email verification

Verify your email by clicking the button below!
@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/email/verify-email'])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
