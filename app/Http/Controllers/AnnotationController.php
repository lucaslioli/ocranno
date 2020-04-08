<?php

namespace App\Http\Controllers;

use Auth;
use App\Page;
use App\Sentence;
use Illuminate\Http\Request;

class AnnotationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sentences = Sentence::whereNotNull('correction')
            ->whereIn('page_id', Auth::user()->pages->map->id)
            ->get();
        
        return view('annotations.index', compact('sentences'));
    }


    /**
     * Select randomly a page and display a sentence to be annotated
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // sort the sentence by user
        $sentences = Sentence::where('correction', null)->get();

        if($sentences->isEmpty())
            return view('empty');

        $sentence = $sentences->random();

        return view('annotations.create', [
            'sentence' => $sentence,
            'page' => $sentence->page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function edit(Sentence $sentence)
    {
        // Uses the same view as create
        return view('annotations.create', [
            'sentence' => $sentence,
            'page' => $sentence->page
        ]);
    }

    /**
     * Updates the sentence with the correct annotation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sentence $sentence)
    {
        $this->authorize('update', $sentence);

        $sentence->annotate(request('correction'));

        return redirect(route('annotations.create'));
    }
}
