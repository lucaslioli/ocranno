@extends('layout')

@section('content')

    <div class="container">

        <div class="annotation row">

            <div class="pdf-page col-8">
                <embed src="/pdf/doc1.pdf" width="100%" height="600" frameborder="0" allowfullscreen>
            </div>
    
            <div class="sentences col-4">

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Sentence</label>
                    <textarea class="form-control" name="sentence" id="sentence" rows="2" readonly>{{ $sentence->sentence }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Correction</label>
                    <textarea class="form-control" name="correction" id="correction" rows="2"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>

            </div>

        </div>

    </div>
   
@endsection
