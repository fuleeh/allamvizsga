@component('mail::message')
# Meghívás

Jó napot kívánunk, ezennel meghívtuk, hogy részt vegyen a diabétesz oldalunk orvosi személyzetében.
Kérjük kattintson a "Tovább az oldalra" gombra és fogadja el a regisztrációját/töltse ki az adatait.

@component('mail::button', ['url' => $url])
Tovább az oldalra
@endcomponent

Köszönjük!<br>
{{ config('app.name') }}
@endcomponent