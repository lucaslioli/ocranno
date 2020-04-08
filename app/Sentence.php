<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{   
    public function annotate($correction)
    {
        $this->correction = $correction;
        $this->save();
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}