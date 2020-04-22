@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" action="/annotations/{{ $sentence->id }}">
            @csrf
            @method('PUT')

            <div class="annotation row">

                <div class="pdf-page col-8">
                    @if(file_exists(public_path()."/pdfs/".$page->file_name))

                        <small id="findHelpBlock" class="form-text text-muted">
                            <span class="badge badge-lg badge-light">Ctrl+F</span> can help you to find the sentence in the file
                        </small>

                        <embed src="/pdfs/{{ $page->file_name }}" width="100%" height="600" frameborder="0" allowfullscreen>
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

                    <div class="form-group d-flex justify-content-between">
                        <div>Page: {{ $page->id }}</div>
                        <div>Sentence: {{ $sentence->id }}</div>
                        <div>Annotations: <strong>{{ $page->annotations.'/'.$page->wrong_words }}</strong></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sentence</label>
                        <textarea class="form-control" name="sentence" id="sentence" rows="3" readonly>{{ $sentence->sentence }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Correction</label>
                        <textarea class="form-control" name="correction" id="correction" rows="3" required>{{ $sentence->correction ? : $sentence->sentence }}</textarea>
                    </div>

                    <div class="form-group">
                        <small id="findHelpBlock" class="form-text text-muted">
                            *In case the sentence is correct, submit it equally
                        </small>
                    </div>

                    @error('correction')
                        <p class="text-danger">{{ $errors->first('correction') }}</p>
                    @enderror

                    @can ('update', $sentence)
                        <div class="d-flex justify-content-between">

                            <button type="submit" class="btn btn-primary col-6"><i class="fas fa-check"></i> Submit</button>

                            @if($page->illegible)
                                <a href="{{ route('pages.illegible', $page) }}" class="btn btn-danger col-5" title="Set page as legible">
                                    <i class="fas fa-eye"></i> Legible
                                </a>
                            @else
                                <a href="{{ route('pages.illegible', $page) }}" class="btn btn-outline-danger col-5" title="Set page as illegible">
                                    <i class="fas fa-eye-slash"></i> Illegible
                                </a>
                            @endif

                        </div>
                    @endcan

                </div>

            </div>
            
        </form>

    </div>
   
@endsection
