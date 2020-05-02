<?php

namespace App\Http\Controllers;

use App\panier;
use App\produit_panier;
use Illuminate\Http\Request;

class PanierController extends Controller
{
  protected $panier;

  public function __construct()
  {
    $this->panier = panier::where('ipv4', $_SERVER['REMOTE_ADDR'] ?: ($_SERVER['HTTP_X_FORWARDED_FOR'] ?: $_SERVER['HTTP_CLIENT_IP']))->first();
  }

  public function show()
  {
    return view('panier',
    [
      'panier' => $this->panier
    ]);
  }
  public function store($produit)
  {
    panier::find($this->panier->id)->produits()->attach('', ['produit_id' => $produit]);
    return redirect()->back();
  }
  public function delete($produit)
  {
    panier::find($this->panier->id)->produits()->detach($produit);
    return redirect()->back();
  }

  //additionnal function
  public function exist($produit)
  {
    return produit_panier::where(['panier_id' => $this->panier->id, 'produit_id' => $produit])->get();
  }
}
