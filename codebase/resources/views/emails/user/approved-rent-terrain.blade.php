@component('mail::message')
# Pending Rent Terrain Request

Dear {{ $user->name }} your request to rent terrain: {{ $terrain->name }} Has been: "APPROVED"
<br />
<br />
Start date: {{$rentTerrain->startDate}}
<br />
End date: {{$rentTerrain->endDate}}
<br />
<br />

Make sure to check the camp visa, so you don't miss anything important
@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/camp-visa'])
Camp Visa
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
