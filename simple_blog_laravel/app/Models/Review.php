<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use illuminate\support\Str;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'featured',
    ];

    //for turning the published_at from a string to a date as diffforhumans doesn't accept string
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genres() //the relation between genres and review
    {
        return $this->belongsToMany(Genre::class);
    }

    public function comments() //the relation between comments and review
    {
        return $this->hasMany(Comment::class);
    }

    public function likes () {//the relation between likes and review
        return $this->belongsToMany(User::class, 'review_like')->withTimestamps(); //withtimestamps to automatically set created_at and updated_at for us 
    }

    public function scopePublished($query) //it means that it accept an query and then be able to perform or run any eloquent query u want 
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeWithGenre($query, string $genre)  
    {    //as it many to many it should be wherehas as it gives the ability to filter out or search based on a relationship
        //to filter by any category we want
        $query->whereHas('genres', function($query) use($genre) { // we wrote use to pass the parameter inside anonymous function scope
            $query->where('slug', $genre);
        });
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    //show only 900 letter of the review
    public function excerpt()
    {
        return Str::limit(strip_tags($this->body), 900);
    }

    //how long it takes for reading -- 250 is the avg reading for humans per min
    public function readingTime()
    {
        $min =  round(str_word_count($this->body) / 250);
        return ($min < 1) ? 1 : $min;
    }
}
