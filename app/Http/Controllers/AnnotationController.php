<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    public function show()
    {
        // sort the sentence by user
        $sentence = Sentence::where('correction', null)->get()->random();

        return view('annotation.show', [
            'sentence' => $sentence,
            'page' => $sentence->page
        ]);
    }

    public function annotate(Request $request, Sentence $sentence)
    {
        $sentence->correction = request('correction');

        $sentence->save();

        return redirect('/annotations');
    }
}
