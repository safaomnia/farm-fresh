<?php

namespace App\Http\Controllers;

use App\categorie;
use App\produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
 public function show()
 {
   return view('produit',
   [
     'produits' => produit::all(),
     'categories' => categorie::all()
   ]);
 }

 public function showithcategorie($id){
   return view('produit',
   [
     'produits' => categorie::with('produits')->findOrFail($id)->produits, //access to the parent columns
     'categorie' => categorie::find($id),
     'categories' => categorie::all()
   ]);
 }

 public function nbproduit($id)
 {
   return categorie::find($id)->produits()->count();
 }

 public function nbnote($id)
 {
   return produit::find($id)->notes()->count();
 }
 public function moynote($id)
 {
   return produit::find($id)->notes()->avg('nb_etoile');
 }
}
