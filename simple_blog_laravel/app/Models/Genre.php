<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'text_color',
        'bg_color',
    ];

    public function reviews() {
        return $this->belongsToMany(Review::class, 'genre_review');
    }
}
