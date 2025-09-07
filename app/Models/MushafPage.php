<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MushafPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_number',
        'image'
    ];

    protected $casts = [
        'page_number' => 'integer'
    ];

    public function getImageUrlAttribute()
    {
        return asset('mushaf/' . $this->image);
    }
}
