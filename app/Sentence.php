<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{   
    public function annotate($correction)
    {
        if($this->correction == null)
            $this->page->increment_annotations();

        $this->correction = $correction;
        $this->save();
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function set_attributes($sentence, $page_id){
        $this->sentence = $sentence;
        $this->page_id = $page_id;

        $this->save();
    }
}
