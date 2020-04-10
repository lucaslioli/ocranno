<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
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
     * Return a array with validated attributes
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return  Array
     */
    protected function validatePage(Request $request)
    {
        return request()->validate([
            'file_name' => 'required',
            'words_number' => 'required',
            'wrong_words' => 'required',
            'year' => ''
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::latest()->get();

        return view('pages.index', compact('pages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

}
