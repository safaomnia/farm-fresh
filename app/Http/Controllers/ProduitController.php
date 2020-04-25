<?php

namespace App\Http\Controllers;

use App\categorie;
use App\produit;
use App\produit_categorie;
use App\produit_note;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
 public function show()
 {
   return view('produit',
   [
     'produits' => produit::orderBy('created_at', 'desc'),
     'categories' => categorie::all()
   ]);
 }

 public function showithcategorie($id){
   return view('produit',
   [
     'produits' => categorie::find($id)->produits(),
     'categories' => categorie::all()
   ]);
 }

 public function nbProduit($id)
 {
   return produit_categorie::where('categorie_id', $id)->count();
 }

 public function nbnote($id)
 {
   return produit::find($id)->notes()->count();
 }
 public function moynote($id)
 {
   return produit::find($id)->notes()->sum('nb_etoile') % $this->nbnote($id);
 }
}
