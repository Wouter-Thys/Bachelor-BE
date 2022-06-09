@component('mail::message')
# Pending Rent Terrain Request

User: {{$user->name}} requested to rent terrain: {{ $terrain->name }}
<br />
<br />
Start date: {{$rentTerrain->startDate}}
<br />
End date: {{$rentTerrain->endDate}}
<br />

@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/landlord/dashboard'])
    View All Pending Terrains
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
