@component('mail::message')
# Pending Rent Terrain Request

Your requested to rent terrain: {{ $terrain->name }}
<br />
<br />
Start date: {{$rentTerrain->startDate}}
<br />
End date: {{$rentTerrain->endDate}}
<br />

@component('mail::button', ['url' => 'https://eindwerk-fe.lokal.host/#/profile/overview'])
View All Pending Terrains
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
