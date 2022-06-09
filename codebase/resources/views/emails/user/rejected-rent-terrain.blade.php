@component('mail::message')
# Pending Rent Terrain Request

Dear {{ $user->name }} your request to rent terrain: {{ $terrain->name }} Has been: "REJECTED"
<br />
<br />
Start date: {{$rentTerrain->startDate}}
<br />
End date: {{$rentTerrain->endDate}}
<br />
<br />

@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/Dashboard'])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
