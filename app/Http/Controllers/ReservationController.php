<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index($movie_id)
	{
            $occupedSeats = DB::table('reservations')->where('movie_id', $movie_id)->pluck('place_id');
                return view('reservations.list', ['movie_id' => $movie_id, 'occupedSeats' => $occupedSeats]);
	}

    public function create(Request $request)
        {
                $seats = $request->input('seat');
                if($seats != NULL) {
                    return view('reservations.form', ['seats' => $request->input('seat'), 'movie_id' => $request->input('movie')]);
                } else {
                    return view('reservations.list', ['movie_id' => $request->input('movie'), 'error' => true]);
                }
        }

    public function addReservation(Request $request)
        {
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $movie_id = $request->input('movie');

            if($name != null && $phone != null && $email != null && $movie_id != null) {
                // sprawdzenie czy miejsca czasami nie zostały zarezerwowane przed chwileczką i zwrócenie odpowiedniej akcji
                $seats = $request->input('seat');

                $string = "SELECT count(id) as cid FROM reservations WHERE";
                $first = true;
                foreach($seats as $seat) {
                    if(!$first)
                        $string .= " OR ";
                    $string .= " place_id = ".$seat;
                    $first = false;
                }

                $result = DB::select($string);
                if($result[0]->cid > 0) {
                    // wracamy do wyboru miejsc i zwracamy odpowiednie info
                    return view('reservations.list', ['movie_id' => $movie_id, 'error' => true]);
                } else {
                    // zapisujemy do bazy rezerwacje i zwracamy odpowiedni widok
                    $address = new Address;
                    $address->name = $name;
                    $address->email = $email;
                    $address->phone = $phone;
                    if($address->save()) {
                        $address_id = $address->id;

                        foreach($seats as $seat) {
                            $reservation = new Reservation;
                            $reservation->movie_id = $movie_id;
                            $reservation->place_id = $seat;
                            $reservation->address_id = $address_id;
                            $reservation->save();
                        }

                        return view('reservations.final', ['address_id' => $address_id]);

                    }
                }
            } else {
                return view('reservations.form', ['error' => true, 'movie_id' => $movie_id]);
            }
        }
}
