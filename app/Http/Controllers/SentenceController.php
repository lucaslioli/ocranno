<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{
    public function annotation()
    {
        $sentence = Sentence::first();

        return view('annotation', [
            'sentence' => $sentence
        ]);
    }
}
