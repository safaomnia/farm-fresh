<?php

namespace App\Http\Controllers;

use App\ferme;
use App\User;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }

  public function test()
  {
    $fermes = ferme::all()->random(rand(5, 7));
    foreach ($fermes as $ferme) {
      for ($i = 0; $i < rand(3, 5); $i++) {
        $error = false;
        do {
          try {
            $ferme->avis()->attach('',['client_id' => User::all()->random()->id, 'avis' => 'hhhhhhhhhh']);
          } catch (PDOException $Exception) {
            $error = true;
          }
        } while($error = false);
      }
    }
  }
}
