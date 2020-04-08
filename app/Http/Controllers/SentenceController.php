<?php

namespace App\Http\Controllers;

use App\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
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
        $this->authorize('id-admin');

        $sentences = Sentence::all();

        return view('sentences.index', compact('sentences'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sentence  $sentence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sentence $sentence)
    {
        //
    }
}
