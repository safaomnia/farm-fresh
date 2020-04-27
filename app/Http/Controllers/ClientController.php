<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show($id)
    {
      return User::find($id);
    }
}
