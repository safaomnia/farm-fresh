<?php

namespace App\Http\Controllers;

use App\chambre;
use App\hotel;
use Illuminate\Support\Facades\Auth;

class ChambreController extends Controller
{
  public function show()
  {
    $hotel = hotel::where('id_agent', Auth::user()->id)->first();
    $chambre = chambre::where('id_hotel', $hotel->id)->get();
    return view('chambre.list', ['rooms' => $chambre, 'hotel' => $hotel]);
  }
}
