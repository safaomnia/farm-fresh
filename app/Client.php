<?php

namespace App;

use App\User;
use Illuminate\Notifications\Notifiable;

class Client extends User
{
  use Notifiable;
  public $table = 'client';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id'
  ];

}
