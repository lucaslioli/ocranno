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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('id-admin');
        
        $pages = Page::paginate(15);

        return view('pages.index', compact('pages'));
    }

    public function search(Request $request)
    {
        $this->authorize('id-admin');

        $query = $request->get('query');
        
        $pages = Page::where('id', $query)
            ->orWhere('file_name', 'LIKE', "%$query%")
            ->paginate(15);

        return view('pages.index', compact('pages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('sentences.index', [
            'sentences' => $page->sentences()->paginate(10)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $id = $page->id;

        $page->delete();

        return response("Page ".$id." deleted successfully!", 200);
    }

    public function illegible(Page $page)
    {
        if($page->illegible){
            $page->set_user(null);
        }

        $page->set_illegible(!$page->illegible);

        return back();
    }
}
