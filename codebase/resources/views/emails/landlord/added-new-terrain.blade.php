@component('mail::message')
# New Terrain Added
<br />
<br />
Name: {{$terrain->name}}
<br />
Description: {{$terrain->description}}
<br />
<br />
@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/landlord/my-terrains'])
My terrains
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
