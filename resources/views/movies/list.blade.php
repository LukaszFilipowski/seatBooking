@extends('../template')
@section('content')
<script>
$(document).ready(function(){    $('.dataTable').DataTable();});
</script>

<div class="page-header" >
<h1>Lista filmów</h1>
</p></div>
    @if ($movies->isEmpty())
Brak filmów!
    @else
<table class="dataTable">
<thead>
<tr>
<th>Tytuł</th>
<th>Opis</th>
<th>Opcje</th>
</tr>
</thead>
<tbody>
                @foreach($movies as $movie)
    <tr>
<td>{{ $movie->title }}</td>
<td>{{ $movie->desc }}</td>

<td>
    <a href="{{ action('ReservationController@index', $movie->id) }}" class="btn btn-default">Rezerwacja</a>
</td>
    </tr>
                @endforeach
            </tbody>
</table>
    @endif
@stop
