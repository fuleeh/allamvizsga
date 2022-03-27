@component('mail::message')
    # Adatbekérés

    Jó napot kívánok, kérem kattintson az "Adatbevitel" gombra, ami az oldalunkra továbbítja önt és be viheti a rendszerünkbe a mért adatát.

    @component('mail::button', ['url' => $url])
        Adatbevitel
    @endcomponent

    Köszönjük!<br>
    {{ config('app.name') }}
@endcomponent
