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
//route home
Auth::routes();
Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/produits', 'produitController@show')->name('produits');
Route::get('/produit/{id}', 'produitController@details')->name('produit');
Route::get('/produits/categorie/{id}', 'produitController@categorie')->name('produits.categorie');
Route::get('/fermes', 'fermeController@show')->name('fermes');
Route::get('/ferme/{id}', 'fermeController@details')->name('ferme');
Route::get('/forums', 'forumController@show')->name('forums');

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
