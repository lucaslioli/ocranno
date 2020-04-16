@extends('layouts.app')

@section('content')

    <div class="container">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">OCR Text Annotation Tool</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a class="btn btn-secondary my-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-primary my-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                </p>
            </div>
        </section>
    
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
   
@endsection
