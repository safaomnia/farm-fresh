<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//route boot
Auth::routes();
Route::get('/', function () {
  return view('home');
})->name('home');

//route produit
Route::get('/produits', 'produitController@show')->name('produits');
Route::get('/produits/categorie/{id}', 'produitController@categorie')->name('produits.categorie');
Route::get('/produit/{id}', 'produitController@details')->name('produit');
Route::post('/produit/noter', 'produitController@noter')->middleware('auth')->name('produit.noter');

//route panier
Route::post('panier/add/produit/{id}', 'panierController@add')->name('panier.add');
Route::post('panier/destroy/produit/{id}', 'panierController@destroy')->name('panier.destroy');

//route ferme
Route::get('/fermes', 'fermeController@show')->name('fermes');
Route::get('/ferme/{id}', 'fermeController@details')->name('ferme');
Route::post('/ferme/donner/avis', 'fermeController@donneravis')->middleware('auth')->name('ferme.donner.avis');

//route forum
Route::get('/forums', 'forumController@show')->name('forums');
Route::get('/forum/{id}', 'forumController@details')->name('forum');
Route::post('/forum/commenter', 'forumController@commenter')->middleware('auth')->name('forum.commenter');

//unfound route
Route::get('/{page}', function ($page) {
  $pages = [
    'identifier' => 'auth.login',
    'inscrire' => 'auth.register',
    'home' => 'home'
  ];
  if (!array_key_exists($page, $pages))
    abort(503, 'Désolé cette page n\'existe pas');
  else return view($pages[$page]);
});
