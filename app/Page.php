<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['file_name', 'words_number', 'wrong_words', 'year', 'annotations'];
    // protected $guarded = [];

    public function path()
    {
        return route('pages.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }
}
