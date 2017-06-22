<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    .seat {
        float: left;
        display: block;
        margin: 5px;
        background: #4CAF50;
        width: 50px;
        height: 70px;
    }

    .empty {
        float: left;
        display: block;
        margin: 5px;
        width: 50px;
        height: 70px;
    }

    .seat-select {
        display: none;
    }

    .seat-select:checked+.seat {
        background: #F44336;
    }
    label.occuped {
        background: #F44336;
    }
    .cinemaHall {
        margin: auto;
        width: 51%;
        height: 62%;
        border: 1px solid #ddd;
    }
</style>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

<div class="container">
            @if (Session::has('message'))
<div class="flash alert">
<p>{{ Session::get('message') }}</p>
    </div>
            @endif
            @yield('content')
        </div>
   </body>
</html>
