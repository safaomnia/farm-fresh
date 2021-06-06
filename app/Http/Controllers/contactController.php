<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\contact;

class contactController extends Controller
{
  public function send()
  { 
    $contact  = new contact;
    $contact['objet']   = \request('subject');
    $contact['email']   = \request('email');
    $contact['message']   = \request('message');
    $contact['fichier']      = NULL;
    $contact['client_id'] = isset(Auth::user()->id);
    $contact->save();

    return redirect()->back();
  }
}
