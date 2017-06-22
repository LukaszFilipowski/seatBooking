@extends('../template')

<h1>Rezerwacja o numerze {{ $address_id }} została pomyślnie złożona</h1>

<a href="{{ action('MovieController@index') }}">Powrót na stronę główną</a>
