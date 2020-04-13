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
        // Search if there is a page in annotation process
        $page = Page::where('user_id', Auth::user()->id)
            ->whereColumn('annotations', '<', 'wrong_words')->first();

        // If there isn't, get a new random one
        if($page == null){
            $pages = Page::where('user_id', null)->get();

            if($pages->isEmpty())
                return view('empty', [
                    'msg' => 'No pages available to be annotated'
                ]);

            $page = $pages->random();

            // Save the current user to be the annotator
            $page->set_user(Auth::user());
        }

        // Get the first sentence that can be annotated
        $sentence = Sentence::where([
                ['correction', null],
                ['page_id', $page->id]
            ])->first();

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

        $request->validate(['correction' => 'required']);

        $sentence->annotate(request('correction'));

        return redirect(route('annotations.create'));
    }
}
