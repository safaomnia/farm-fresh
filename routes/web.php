<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

#route boot
Auth::routes();
Route::view('/', 'home');
Route::view('/home', 'home');

#route produit
Route::get('produits', 'produitController@index')->name('product.index');
Route::get('produits/categorie/{id}', 'produitController@categorie')->name('product.categorie');
Route::get('produit/{id}', 'produitController@show')->name('product.show');
Route::post('produit/noter/{produit}', 'produitController@note_store')->name('note.store');
Route::post('produit/note/update/{produit}', 'produitController@note_update')->name('note.update');

#route panier
Route::get('panier', 'panierController@show')->name('card.show');
Route::get('panier/add/produit/{id}', 'panierController@store')->name('card.store');
Route::get('panier/destroy/produit/{id}', 'panierController@delete')->name('card.delete');

#route ferme
Route::get('fermes', 'fermeController@index')->name('farm.index');
Route::get('fermes/mine', 'fermeController@mine')->middleware('can:viewAny, App\ferme')->name('farm.mine');
Route::get('ferme/{id}', 'fermeController@show')->name('farm.show');
Route::view('ferme//create', 'ferme.create')->name('farm.create');
Route::put('ferme/store', 'fermeController@store')->name('farm.store');
Route::get('ferme/edit/{id}', 'fermeController@edit')->name('farm.edit');
Route::post('ferme/update/{id}', 'fermeController@update')->name('farm.update');
Route::get('ferme/delete/{id}', 'fermeController@delete')->name('farm.delete');

//route ferme avis
Route::post('ferme/donner/avis/{ferme}', 'ferme_avisController@store')->name('notice.store');
Route::post('ferme/update/avis/{ferme}', 'ferme_avisController@update')->name('notice.update');
Route::get('ferme/delete/avis/{id}', 'ferme_avisController@delete')->name('notice.delete');

#route forum
Route::get('forums', 'forumController@index')->name('forum.index');
Route::get('forum/{id}', 'forumController@show')->name('forum.show');
Route::post('forum/store', 'forumController@store')->name('forum.store');
Route::get('forum/edit/{id}', 'forumController@edit')->name('forum.edit');
Route::post('forum/update/{id}', 'forumController@update')->name('forum.update');
Route::get('forum/delete/{id}', 'forumController@delete')->name('forum.delete');

//route forum commentaire
Route::post('forum/store/{forum}', 'forum_commentaireController@store')->name('comment.store');
Route::get('forum/commentaire/edit/{forum}/{id}', 'forum_commentaireController@edit')->name('comment.edit');
Route::post('forum/commentaire/update/{id}', 'forum_commentaireController@update')->name('comment.update');
Route::get('forum/commentaire/delete/{id}', 'forum_commentaireController@delete')->name('comment.delete');

//route forum commentaire repondes
Route::post('forum/commentaire/reponde/{commentaire}', 'forum_commentaire_repondeController@store')->name('reply.store');
Route::get('forum/commentaire/reponde/edit/{forum}/{commentaire}/{id}', 'forum_commentaire_repondeController@edit')->name('reply.edit');
Route::post('forum/commentaire/reponde/update/{forum}/{id}', 'forum_commentaire_repondeController@update')->name('reply.update');
Route::get('forum/commentaire/reponde/delete/{id}', 'forum_commentaire_repondeController@delete')->name('reply.delete');

#route profil
Route::get('profil/{id}', 'clientController@show')->name('profile.show');
Route::get('profil/edit', 'clientController@edit')->name('profile.edit');
Route::post('profil/update', 'clientController@update')->name('profile.update');
Route::get('profil/delete', 'clientController@delete')->name('profile.delete');
