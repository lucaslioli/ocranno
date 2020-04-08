@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/annotations/{{ $sentence->id }}">
            @csrf
            @method('PUT')

            <div class="annotation row">

                <div class="pdf-page col-8">
                    <small id="findHelpBlock" class="form-text text-muted">
                        <span class="badge badge-lg badge-light">Ctrl+F</span> can help you to find the sentence in the file
                    </small>
                    <embed src="/pdf/doc1.pdf" width="100%" height="600" frameborder="0" allowfullscreen>
                </div>
        
                <div class="sentences col-4">

                    <div class="form-group">
                        <p>Page annotations: {{ $page->annotations.'/'.$page->wrong_words }}</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sentence</label>
                        <textarea class="form-control" name="sentence" id="sentence" rows="3" readonly>{{ $sentence->sentence }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Correction</label>
                        <textarea class="form-control" name="correction" id="correction" rows="3">{{ $sentence->correction ? : $sentence->sentence }}</textarea>
                    </div>

                    @can ('update', $sentence)
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Register</button>
                    @endcan

                </div>

            </div>
            
        </form>

    </div>
   
@endsection
