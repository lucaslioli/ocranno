<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable = ['correction', 'observation'];

    public function annotate($correction, $observation = NULL)
    {
        if($this->correction == null)
            $this->page->increment_annotations();

        $this->correction = $correction;
        $this->observation = $observation;

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
