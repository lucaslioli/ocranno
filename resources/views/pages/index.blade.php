@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Pages</h1>

        @foreach ($pages as $page)

            <h3>
                <a href="{{ route('pages.edit', $page->id) }}">{{ $page->file_name }}</a>
                <small class="text-muted">
                    <i>Words:</i> {{ $page->words_number }} /
                    <i>Wrong words:</i> {{ $page->wrong_words }}
                </small>
            </h3>
            
        @endforeach

    </div>

@endsection