@extends('layouts.app')

@section('content')

    <div class="container">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">OCR Text Annotation Tool</h1>

                <div class="d-flex justify-content-center">
                    <p class="lead text-muted col-10">Welcome to OCRAnno, a tool that will help us improve the quality of the text that is 
                        extracted by OCR software. You can help us by using OCRAnno to provide the ground-truth 
                        that will be used to train machine learning models that will automatically correct OCR-ed text</p>
                    <p>
                </div>

                @guest
                    <a class="btn btn-outline-primary col-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-primary col-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                    <a class="btn btn-outline-primary col-3" href="{{ route('annotations.create') }}">Start annotation</a>
                @endguest

            </div>
        </section>
    
        <div class="album py-3 bg-light">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Display original document</h5>
                                <p class="card-text">The PDF documents were split into pages. The system shows the source page and the sentence 
                                    that may need correction. Annotators can search for the sentence to identify where it occurs on the page.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Random documents by annotator</h5>
                                <p class="card-text">The annotators receive a random selection of pages to annotate.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Set sentence as illegible</h5>
                                <p class="card-text">If the original document is of poor quality and impossible to read, 
                                    annotators can classify it as illegible.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
   
@endsection
