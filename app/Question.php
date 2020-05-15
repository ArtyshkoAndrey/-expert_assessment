<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  function ratings () {
    return $this->hasOne(Rating::class);
  }
}
