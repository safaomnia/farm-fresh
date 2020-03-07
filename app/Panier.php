<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    public $table = 'panier';

    public function user(){
      return $this->hasOne(User::class);
    }
}
