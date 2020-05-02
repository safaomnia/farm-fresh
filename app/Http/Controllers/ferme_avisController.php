<?php

namespace App\Http\Controllers;

use App\ferme_avis;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ferme_avisController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store($ferme)
  {
    User::find(Auth::user()->id)->fermeAvis()->attach('', ['etoiles' => request('rating'), 'avis' => \request('avis'), 'ferme_id' => $ferme]);
    return redirect()->back();
  }

  public function update()
  {
    $ferme_avis = ferme_avis::find(\request('id'));
    $ferme_avis->avis = request('avis');
    $ferme_avis->etoiles = request('rating');
    $ferme_avis->save();
    return redirect()->back();
  }

  public function delete($id)
  {
    ferme_avis::destroy($id);
    return redirect()->back();
  }
}
