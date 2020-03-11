<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
  public $table = 'agriculteur';
  public $timestamps = false;

  protected $fillable = [
    'id', 'domaine', 'certification'
  ];

  public function fermes()
  {
    return $this->hasMany(Ferme::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'id');
  }
}
