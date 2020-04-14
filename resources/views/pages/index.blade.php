@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Pages</h1>
            <h5 class="text-secondary">
                {{ $pages->total() }} pages find
            </h5>
        </div>

        <hr>

        <ul class="list-group list-group-flush">

            @foreach ($pages as $page)

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $page->id . " - " . $page->file_name }}
                    <small class="text-muted">
                        <i>Words:</i> <b>{{ $page->words_number }} |</b>
                        <i>Wrong words:</i> <b>{{ $page->wrong_words }}</b>
                    </small>
                    <span class="badge badge-primary badge-pill">{{ $page->annotations }}</span>
                </li>
                
            @endforeach
        
        </ul>

        <div class="d-flex justify-content-end">
            {{ $pages->links() }}
        </div>

    </div>

@endsection