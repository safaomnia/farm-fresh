<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agriculteur extends Model
{
  public $table = 'agriculteur';
  public $timestamps = false;

  protected $fillable = [
    'domaine', 'certification'
  ];

  public function fermes()
  {
    return $this->hasMany(ferme::class);
  }

  public function client()
  {
    return $this->belongsTo(User::class, 'client_id');
  }
}
