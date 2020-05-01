<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

#route boot
Auth::routes();
Route::get('/', function () {
  return view('home');
})->name('home');

#route produit
Route::get('produits', 'produitController@show')->name('produits');
Route::get('produits/categorie/{id}', 'produitController@categorie')->name('produits.categorie');
Route::get('produit/{id}', 'produitController@details')->name('produit');
Route::post('produit/noter/{produit}', 'produitController@noter')->middleware('auth')->name('produit.noter');
Route::post('produit/update/note/{produit}', 'produitController@update_note')->middleware('auth')->name('produit.update.note');

#route panier
Route::get('panier', 'panierController@show')->name('panier');
Route::get('panier/add/produit/{id}', 'panierController@add')->name('panier.add');
Route::get('panier/destroy/produit/{id}', 'panierController@destroy')->name('panier.destroy');

#route ferme
Route::get('fermes', 'fermeController@show')->name('fermes');
Route::get('ferme/{id}', 'fermeController@details')->name('ferme');
Route::get('ferme/update/form/{id}', 'fermeController@form')->name('ferme.update.form');
Route::get('ferme/update/{id}', 'fermeController@update')->name('ferme.update');
Route::get('ferme/delete/{id}', 'fermeController@delete')->name('ferme.delete');
//route ferme avis
Route::post('ferme/donner/avis/{ferme}', 'fermeController@donner_avis')->middleware('auth')->name('ferme.donner.avis');
Route::post('ferme/update/avis/{ferme}', 'fermeController@update_avis')->middleware('auth')->name('ferme.update.avis');
Route::get('ferme/delete/avis/{id}', 'fermeController@delete_avis')->middleware('auth')->name('ferme.delete.avis');

#route forum
Route::get('forums', 'forumController@show')->name('forums');
Route::get('forum/{id}', 'forumController@details')->name('forum');
Route::post('forum/publier', 'forumController@add')->name('forum.publier');
Route::get('forum/update/{id}', 'forumController@form')->name('forum.update.form');
Route::post('forum/update/{id}', 'forumController@update')->name('forum.update');
Route::get('forum/delete/{id}', 'forumController@delete')->name('forum.delete');
//route forum commentaire
Route::post('forum/commenter/{forum}', 'forumController@commenter')->middleware('auth')->name('forum.commenter');
Route::get('forum/commentaire/update/{forum}/{id}', 'forumController@commentaire_form')->middleware('auth')->name('forum.commentaire.form');
Route::post('forum/commentaire/update/{id}', 'forumController@commentaire_update')->middleware('auth')->name('forum.commentaire.update');
Route::get('forum/commentaire/delete/{id}', 'forumController@commentaire_delete')->middleware('auth')->name('forum.commentaire.delete');
//route forum commentaire repondes
Route::post('forum/commentaire/reponde/{commentaire}', 'forumController@reply')->middleware('auth')->name('forum.commentaire.repondre');
Route::get('forum/commentaire/reponde/update/{forum}/{commentaire}/{id}', 'forumController@reply_form')->middleware('auth')->name('forum.commentaire.reponde.form');
Route::post('forum/commentaire/reponde/update/{forum}/{id}', 'forumController@reply_update')->middleware('auth')->name('forum.commentaire.reponde.update');
Route::get('forum/commentaire/reponde/delete/{id}', 'forumController@reply_delete')->middleware('auth')->name('forum.commentaire.reponde.delete');

#route profil
Route::get('profil/{id}', 'clientController@show')->middleware('auth')->name('profil');
Route::get('profil/update/form', 'clientController@form')->middleware('auth')->name('profil.update.form');
Route::post('profil/update', 'clientController@update')->middleware('auth')->name('profil.update');
Route::get('profil/delete', 'clientController@delete')->middleware('auth')->name('profil.delete');

//unfound route
Route::get('{page}', function ($page) {
  $pages = [
    'identifier' => 'auth.login',
    'inscrire' => 'auth.register',
    'home' => 'home'
  ];
  if (!array_key_exists($page, $pages))
    abort(503, 'Désolé cette page n\'existe pas');
  else return view($pages[$page]);
});
