<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Commande extends Pivot
{
  public function livraison()
  {
    return $this->belongsTo(Livraison::class);
  }
}
