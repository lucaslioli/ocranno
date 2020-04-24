<?php

namespace App\Http\Controllers;

use App\User;
use App\Page;
use Illuminate\Http\Request;

class UserController extends Controller
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

        $users = User::addSelect(['annotations' => 
                Page::selectRaw('sum(annotations) as annotations')
                ->whereColumn('user_id', 'users.id')
            ])->paginate(15);

        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $this->authorize('id-admin');

        $query = $request->get('query');
        
        $users = User::where('id', $query)
            ->orWhere('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(15);

            return view('users.index', compact('users'));
    }

}
