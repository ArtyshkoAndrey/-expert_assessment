<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  function question() {
    return $this->belongsTo(Question::class);
  }
}
