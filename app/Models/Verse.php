<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verse extends Model
{
    public function surah()
{
    return $this->belongsTo(Surah::class);
}

}
