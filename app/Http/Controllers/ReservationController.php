<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Mail\ReservationAccept;
use App\Mail\ReservationAdminMail;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
      Mail::to('steponas@hotmail.com')->send(new ReservationAdminMail($reservation));
      return redirect('/')->with(['message' => 'Reservation successful']);
    }
}
