@extends('../template')

<div style="margin: 10%;">
    <h1>Rezerwacja miejsc</h1>
    <?php if(isset($error)): ?>
        <p style="color:red;">Musisz uzupełnić wszystkie pola</p>
    <?php endif; ?>
    <form id="reservation" method="post" action="{{ action('ReservationController@addReservation') }}">
      <input type="hidden" name="movie" value="{{ $movie_id }}">
      <div class="form-group">
        <label for="name">Imię i nazwisko</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>

      <div class="form-group">
        <label for="phone">Numer telefonu</label>
        <input type="number" class="form-control" id="phone" name="phone">
      </div>

       <div class="form-group">
        <label for="email">Lista wybranych miejsc: </label>
        <?php if(isset($seats)) {
        foreach($seats as $seat) {
            echo $seat.', '; ?>
            <input type="hidden" name="seat[]" value="<?=$seat;?>"/>
        <?php } } ?>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-default">Rezerwuj</button>
    </form>
</div>
