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

        $sentences = Sentence::paginate(15);

        return view('sentences.index', compact('sentences'));
    }

    public function search(Request $request)
    {
        $this->authorize('id-admin');

        $query = $request->get('query');
        
        $sentences = Sentence::where('id', $query)
            ->orWhere('page_id', 'LIKE', "%$query%")
            ->orWhere('sentence', 'LIKE', "%$query%")
            ->paginate(15);

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
        $sentence->page->decrement_wrong_words();

        if($sentence->correction != null)
            $sentence->page->dencrement_annotations();

        $id = $sentence->id;

        $sentence->delete();

        return response("Sentence ".$id." deleted successfully!", 200);
    }
}
