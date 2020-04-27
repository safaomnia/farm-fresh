<?php

namespace App\Http\Controllers;

use App\ferme;
use App\produit;
use Illuminate\Http\Request;

class FermeController extends Controller
{
  protected $time;
  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
  }
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
    return view('ferme',
      [
        'time' => $this->time,
        'produits' => produit::all()->where('ferme_id', $id),
        'all_avis' => ferme::with('avis')->findOrFail($id)->avis,
        'ferme' => ferme::find($id)
      ]);
  }

  public function etoiles($id)
  {
    return ferme::find($id)->avis()->count();
  }

  public function avg($id)
  {
    return ferme::find($id)->avis()->avg('etoiles');
  }
}
