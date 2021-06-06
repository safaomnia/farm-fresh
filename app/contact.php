<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
  public $table = 'contact';
  protected $fillable = [
    'subject', 'file', 'message'
  ];

  public function client()
  {
    return $this->belongsTo(User::class);
  }
}
