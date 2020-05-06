<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demande extends Model
{
  public $table = 'demande';
  protected $fillable = [
    'type', 'etat', 'certificate'
  ];

  public function client()
  {
    return $this->belongsTo(User::class, 'client_id');
  }
}
