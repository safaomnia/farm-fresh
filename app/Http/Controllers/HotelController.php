<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Avis;
use App\Chambre;
use App\Hotel;
use App\Reservation;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
  public function show()
  {
    $hotel = hotel::orderBy('created_at', 'desc')->paginate(7);
    $agent = user::all();
    return view('hotel.list', ['hotels' => $hotel, 'agents' => $agent]);
  }

  public function myHotelShow()
  {
    if (Auth::user()->profil == 'agent_hotel') $hotel = hotel::where('id_agent', Auth::user()->id)->paginate(7);
    $agent = user::all();
    return view('hotel.list', ['hotels' => $hotel, 'agents' => $agent]);
  }

  public function search()
  {
    $hotel = new hotel();
    if (empty(\request('nom'))) $hotel->nom = null; else $hotel->nom = request('nom');
    if (empty(\request('adresse'))) $hotel->adresse = null; else $hotel->adresse = request('adresse');
    if (empty(\request('categorie'))) $hotel->categorie = null; else $hotel->categorie = request('categorie');
    $hotel = hotel::where('nom', 'LIKE', "%{$hotel->nom}%")
      ->orWhere('adresse', 'LIKE', "%{$hotel->adresse}%")
      ->orWhere('libelle', 'LIKE', $hotel->categoriey)
      ->paginate(7);
    $agent = user::all();
    return view('hotel.list', ['hotels' => $hotel, 'agents' => $agent]);
  }

  public function details($id)
  {
    $hotel = hotel::find($id);
    $chambre = chambre::where('id_hotel', $id)->get();
    $user = user::all();
    $avis = avis::where('id_hotel', $id)->get();
    return view('hotel.details', ['hotel' => $hotel, 'rooms' => $chambre, 'utilisateurs' => $user, 'avis' => $avis, 'id' => $id]);
  }

  public function comment($id)
  {
    $avis = new avis();
    $avis->note = \request('note');
    $avis->commentaire = \request('commentaire');
    $avis->id_hotel = $id;
    $avis->id_utilisateur = Auth::user()->id;
    $avis->save();
    return redirect()->route('hotel.details', $id);
  }

  public function create()
  {
    return view('hotel.formCreate');
  }

  public function insert()
  {
    $this->validator(\request());
    $hotel = new hotel();
    $hotel->nom = request('nom');
    $hotel->adresse = request('adresse');
    $hotel->telephone = request('telephone');
    $hotel->categorie = request('categorie');
    $hotel->libelle = request('libelle');
    $hotel->image = $this->upload();
    $hotel->id_agent = Auth::user()->id;
    $hotel->save();
    return redirect('/hotel');
  }

  protected function validator(Request $request)
  {
    $request->validate([
      'nom' => 'required',
      'adresse' => 'required',
      'telephone' => 'required|numeric|digits:8',
      'libelle' => 'required',
      'image' => 'image|nullable|max:1999'
    ]);
  }

  protected function upload($file = "room3.jpg")
  {
    if (request()->hasFile('image')) {
      $fileExtension = \request()->file('image')->getClientOriginalExtension();
      $fileName = request()->file('image')->getClientOriginalName();
      $file = $fileName . '_' . time() . '.' . $fileExtension;
      request()->file('image')->move('images/hotels', $file);
      //and then to make link between storage browser and public folder go to the terminal and tap php artisan storage:link
    } else {
      return $file;
    }
  }

  public function edit($id)
  {
    $hotel = hotel::find($id);
    return view('hotel.formEdit', ['hotel' => $hotel]);
  }

  public function update($id)
  {
    $hotel = hotel::find($id);
    $this->validator(\request());
    $hotel->nom = request('nom');
    $hotel->adresse = request('adresse');
    $hotel->telephone = request('telephone');
    $hotel->categorie = request('categorie');
    $hotel->libelle = request('libelle');
    $hotel->image = $this->upload($hotel->image);
    $hotel->save();
    return redirect('/hotel');
  }

  public function delete($id)
  {

    DB::beginTransaction(); //for principe ACID

    annonce::where('id_hotel', '=', $id)->delete(); // Delete annonces de ce hotel
    $chambres = chambre::where('id_hotel', '=', $id)->get();
    if (!empty($chambres)) {
      foreach ($chambres as $chambre) {
        reservation::where('id_chambre', '=', $chambre->id)->delete(); // Delete reservations des chambres de ce hotel
      }
    }
    chambre::where('id_hotel', '=', $id)->delete(); // Delete chambres de ce hotel
    hotel::where('id', '=', $id)->delete();
    DB::commit();
    return redirect('hotel');
  }
}
