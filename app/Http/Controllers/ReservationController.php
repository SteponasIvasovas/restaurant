<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;

class ReservationController extends Controller
{
    public function create() {
      return view('reservation.create');
    }

    public function store(StoreReservationRequest $request) {
      $reservation = new Reservation();
      $reservation->user_id = $request->user()->id;
      $reservation->person_count = $request->person_count;
      $reservation->time = $request->time;
      $reservation->date = $request->date;
      $reservation->save();
      return redirect('/')->with(['message' => 'Reservation successful']);
    }
}
