@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="justify-content-between align-items-center">
            <h1>Pages</h1>
            <h5 class="text-secondary">
                {{ $pages->total() }} pages find
            </h5>
        </div>

        <hr>

        @foreach ($pages as $page)

            <h3>
                {{ $page->id . " - " . $page->file_name }}
                <small class="text-muted">
                    <i>Words:</i> {{ $page->words_number }} /
                    <i>Wrong words:</i> {{ $page->wrong_words }} /
                    <i>Annotations:</i> {{ $page->annotations }}
                </small>
            </h3>
            
        @endforeach

        <div class="justify-content-end">
            {{ $pages->links() }}
        </div>

    </div>

@endsection