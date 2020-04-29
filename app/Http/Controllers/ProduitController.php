<?php

namespace App\Http\Controllers;

use App\categorie;
use App\produit;
use App\produit_note;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
  protected $time;

  //boot functions
  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
  }

  public function show()
  {
    return view('produits',
      [
        'time' => $this->time,
        'produits' => produit::orderBy('created_at', 'DESC')->get(),
        'categories' => categorie::orderBy('nom')->get()
      ]);
  }

  public function categorie($id)
  {
    $categorie = categorie::find($id);
    return view('produits',
      [
        'time' => $this->time,
        'produits' => $categorie->produits, //access to the parent columns
        'Categorie' => $categorie,
        'categories' => categorie::orderBy('nom')->get()
      ]);
  }

  public function details($id)
  {
    if (Auth::check())
      if ((produit_note::where(['produit_id' => $id, 'client_id' => Auth::user()->id])->first()) == NULL) $note = NULL;
      else $note = produit_note::where(['produit_id' => $id, 'client_id' => Auth::user()->id])->first();
    else
      $note = NULL;
    return view('produit',
      [
        'time' => $this->time,
        'client_note' => $note,
        'produit' => produit::find($id),
        'categories' => categorie::orderBy('nom')->get()
      ]);
  }

  public function noter($produit)
  {
    User::find(Auth::user()->id)->produitNotes()->attach('', ['etoiles' => request('rating'), 'produit_id' => $produit]);
    return redirect()->back();
  }

  public function update_note()
  {
    $produit_note = produit_note::find(\request('id'));
    $produit_note->etoiles = request('rating');
    $produit_note->save();
    return redirect()->back();
  }

  //additional functions
  public function count($id)
  {
    return categorie::find($id)->produits()->count();
  }

  public function etoiles($id)
  {
    return produit::find($id)->notes()->count();
  }

  public function avg($id)
  {
    return produit::find($id)->notes()->avg('etoiles');
  }
}
