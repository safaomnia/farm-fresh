<?php

namespace App\Http\Controllers;

use App\agriculteur;
use App\livreur;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

  protected $time;

  public function __construct()
  {
    $this->time = $time = new \Westsworld\TimeAgo(new \Westsworld\TimeAgo\Translations\Fr());
  }

  public function show($id)
  {
    $client = User::find(Auth::user()->id);
    if ($client->type == 'client') $view = 'profil.client';
    elseif ($client->type == 'agriculteur') $view = 'profil.agriculteur';
    else $view = 'profil.livreur';
    return view($view, [
      'time' => $this->time,
      'client' => $client
    ]);
  }

  public function form()
  {
    return view('profil.form', [
      'client' => User::find(Auth::user()->id)
    ]);
  }

  public function update()
  {
    $client = User::find(Auth::user()->id);
    $client->nom = \request('nom');
    $client->prenom = \request('prenom');
    $client->datenai = \request('datenai');
    $client->email = \request('email');
    $client->telephone = \request('telephone');
    $client->adresse = \request('adresse');
    $client->sexe = \request('sexe');
    $client->save();
    if (Auth::user()->type == 'agriculteur') {
      $agriculteur = agriculteur::find(Auth::user()->id);
      $agriculteur->domaine = \request('domaine');
      $agriculteur->certificate = \request('certificate');
      $agriculteur->save();
    }
    if (Auth::user()->type == 'livreur')
    {
      $livreur = livreur::find(Auth::user()->id);
      $livreur->nom_entreprise = \request('nom_entreprise');
      $livreur->telephone_entreprise = \request('telephone_entreprise');
      $livreur->adresse_entreprise = \request('adresse_entreprise');
      $livreur->save();
    }
    return redirect()->back();
  }

  public function delete()
  {

  }
}
