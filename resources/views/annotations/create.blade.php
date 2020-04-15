@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/annotations/{{ $sentence->id }}">
            @csrf
            @method('PUT')

            <div class="annotation row">

                <div class="pdf-page col-8">
                    @if(file_exists(public_path() . "/pdf/" . $page->file_name))

                        <small id="findHelpBlock" class="form-text text-muted">
                            <span class="badge badge-lg badge-light">Ctrl+F</span> can help you to find the sentence in the file
                        </small>

                        <embed src="/pdf/{{ $page->file_name }}" width="100%" height="600" frameborder="0" allowfullscreen>
                    @else

                        <div class="card border-secondary mb-3" style="width: 100%; height: 600px;">
                            <div class="card-body text-secondary">
                                <h5 class="card-title">Sorry</h5>
                                <p class="card-text">the original PDF file for the current sentence wasn't found.</p>
                                <p>The file name should be: "{{ $page->file_name }}"</p>
                            </div>
                        </div>

                    @endif
                </div>
        
                <div class="sentences col-4">

                    <div class="form-group">
                        <p>Page Id: {{ $page->id }} | Annotations: {{ $page->annotations.'/'.$page->wrong_words }}</p>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sentence</label>
                        <textarea class="form-control" name="sentence" id="sentence" rows="3" readonly>{{ $sentence->sentence }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Correction</label>
                        <textarea class="form-control" name="correction" id="correction" rows="3" required>{{ $sentence->correction ? : $sentence->sentence }}</textarea>
                    </div>

                    @error('correction')
                        <p class="text-danger">{{ $errors->first('correction') }}</p>
                    @enderror

                    @can ('update', $sentence)
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Register</button>
                    @endcan

                </div>

            </div>
            
        </form>

    </div>
   
@endsection
