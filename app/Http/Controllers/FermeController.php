<?php

namespace App\Http\Controllers;

use App\ferme;
use App\ferme_avis;
use App\produit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FermeController extends Controller
{
  protected $time;

  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
  }

  //boot functions
  public function show()
  {
    return view('fermes',
      [
        'time' => $this->time,
        'fermes' => ferme::orderBy('created_at', 'DESC')->get()
      ]);
  }

  public function details($id)
  {
    if (Auth::check())
      if ((ferme_avis::where(['ferme_id' => $id, 'client_id' => Auth::user()->id])->first()) == NULL) $avis = NULL;
      else $avis = ferme_avis::where(['ferme_id' => $id, 'client_id' => Auth::user()->id])->first();
    else
      $avis = NULL;
    return view('ferme',
      [
        'time' => $this->time,
        'ferme_avis' => $avis,
        'produits' => produit::all()->where('ferme_id', $id),
        'all_avis' => ferme::with('avis')->findOrFail($id)->avis,
        'ferme' => ferme::find($id)
      ]);
  }

  //avis functions
  public function donner_avis($ferme)
  {
    User::find(Auth::user()->id)->fermeAvis()->attach('', ['etoiles' => request('rating'), 'avis' => \request('avis'), 'ferme_id' => $ferme]);
    return redirect()->back();
  }

  public function update_avis()
  {
    $ferme_avis = ferme_avis::find(\request('id'));
    $ferme_avis->avis = request('avis');
    $ferme_avis->etoiles = request('rating');
    $ferme_avis->save();
    return redirect()->back();
  }

  public function delete_avis($id)
  {
    ferme_avis::destroy($id);
    return redirect()->back();
  }

  //additional functions
  public function etoiles($id)
  {
    return ferme::find($id)->avis()->count();
  }

  public function avg($id)
  {
    return ferme::find($id)->avis()->avg('etoiles');
  }
}
