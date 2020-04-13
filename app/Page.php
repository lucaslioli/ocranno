<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['file_name', 'words_number', 'wrong_words', 'year', 'annotations'];
    // protected $guarded = [];

    public function path()
    {
        return route('pages.edit', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }

    public function increment_annotations()
    {
        $this->annotations++;
        $this->save();
    }

    public function set_user(User $user){
        $this->user_id = $user->id;
        $this->save();
    }
}
