<?php

namespace App\Http\Controllers;

use App\hotel;
use App\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use MongoDB\Driver\Session;


class reservationController extends Controller
{
  public function show()
  {
    $reservation = reservation::where('id_client', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    $hotel = hotel::all();
    $chambre = hotel::all();
    return view('hotel.reservation', ['reservations' => $reservation, 'hotels' => $hotel, 'chambres' => $chambre]);
  }

  public function booking($id)
  {
    request()->validate([
      'debut' => 'required|date|after_or_equal:today',
      'fin' => 'required|date|after:debut'
    ]);
    $rooms = DB::select(
      "SELECT c.id FROM chambre c, hotel h WHERE h.id = ? AND c.id_hotel = h.id AND c.nb_personne = ? AND c.id NOT IN
      (SELECT id_chambre FROM `reservation` WHERE date_debut >= ? AND date_fin <= ?)",
      array($id, request('nb'), \request('debut'), \request('fin'))
    );
    if (!empty($rooms)) {
      $reservation = new reservation();
      $reservation->date_debut = \request('debut');
      $reservation->date_fin = \request('fin');
      $reservation->id_chambre = $rooms[0]->id;
      $reservation->id_client = Auth::user()->id;
      $reservation->save();
      return redirect()->route('reservation');
    } else {
      \Session::flash('error', 'Ce hôtel est saturé dans cette date');
      return back();
    }
   }
}
