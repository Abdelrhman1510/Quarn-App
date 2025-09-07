<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    public function verses()
{
    return $this->hasMany(Verse::class);
}

}
