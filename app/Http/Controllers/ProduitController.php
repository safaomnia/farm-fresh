<?php

namespace App\Http\Controllers;

use App\categorie;
use App\produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
  protected $time;
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
        'produits' =>  $categorie->produits, //access to the parent columns
        'Categorie' => $categorie,
        'categories' => categorie::orderBy('nom')->get()
      ]);
  }

  public function details($id)
  {
    return view('produit',
      [
        'time' => $this->time,
        'produit' => produit::find($id),
        'categories' => categorie::orderBy('nom')->get()
      ]);
  }

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
