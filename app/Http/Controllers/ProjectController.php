<?php

namespace App\Http\Controllers;

use App\Page;
use App\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProjectController extends Controller
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
        
        return view('project.index');
    }

    /**	
     * Store a newly created resource in storage.
     *	
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response	
     */	
    public function store(Request $request)	
    {
        $request->validate(['json_file' => 'required|mimes:json']);

        $pbefore = Page::count();
        $sbefore = Sentence::count();

        // Log::info("Starting process the data...");

        if(!$request->file('json_file')->isValid()) {
            return response()
                ->view('project.index', ['response' => "ERROR: The file is not valid!"], 400);
        }

        // Read File
        $jsonString = file_get_contents($request->file('json_file'));
        $data = json_decode($jsonString, true);

        foreach ($data as $page) {

            $new_page = new Page();

            $new_page->set_attributes(
                $page['file_name'],
                $page['words_number'],
                $page['wrong_words']);

            foreach ($page['sentences'] as $sentence) {
                $new_sentence = new Sentence();

                $new_sentence->set_attributes(
                    $sentence['sentence'],
                    $new_page->id
                );
            }
        }

        $data = array(
            "response" => "Success!",
            "pages" => (Page::count() - $pbefore),
            "sentences" => (Sentence::count() - $sbefore)
        );

        return response()
            ->view('project.index', $data, 200);
    }

    /**	
     * Upload PDF files to the project
     *	
     * @param  \Illuminate\Http\Request  $request	
     * @return \Illuminate\Http\Response	
     */	
    public function upload(Request $request)	
    {
        $request->validate([
            'pdf_files' => 'required',
            'pdf_files.*' => 'mimes:pdf'
        ]);

        $files = $request->file('pdf_files');

        foreach($files as $file)
            $file->move(public_path("pdfs/"), $file->getClientOriginalName());

        $data = array(
            "response" => "Files uploaded successfully!"
        );

        return response()
            ->view('project.index', $data, 200);
    }
}
