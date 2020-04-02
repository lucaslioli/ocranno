@extends('layout')

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
                        <label for="exampleFormControlTextarea1">Sentence</label>
                        <textarea class="form-control" name="sentence" id="sentence" rows="2" readonly>{{ $sentence->sentence }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Correction</label>
                        <textarea class="form-control" name="correction" id="correction" rows="2">{{ $sentence->sentence }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>

                </div>

            </div>
            
        </form>

    </div>
   
@endsection
