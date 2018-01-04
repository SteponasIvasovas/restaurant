<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Mail\ReservationAccept;
use Illuminate\Support\Facades\Mail;
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
      Mail::to($request->user())->send(new ReservationAccept($reservation));
      return redirect('/')->with(['message' => 'Reservation successful']);
    }
}
