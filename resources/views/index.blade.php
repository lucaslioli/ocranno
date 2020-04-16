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
                    <a class="btn btn-outline-primary col-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-primary col-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                </p>
            </div>
        </section>
    
        <div class="album py-4 bg-light">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Display original document</h5>
                                <p class="card-text">The documents were splited into pages and the system displays the original PDF 
                                    from that page to help the annotator to search the sentence and identify the error to correct.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Random documents by annotator</h5>
                                <p class="card-text">Each document is randomly selected between the annotators, then each error
                                    identified in that file will be displayed. This helps to get familiar with the content to be annotated.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Set document as illegible</h5>
                                <p class="card-text">If a document is too old, or was bad scanned, it's possible to define that document
                                    as illegible, then the system will select another one to the annotator.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
   
@endsection
