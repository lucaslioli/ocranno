@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Sentences</h1>

        @foreach ($sentences as $sentence)

            <blockquote class="blockquote">
                <p class="mb-0">{{ $sentence->id }} -
                    <a href="{{ route('annotations.edit', $sentence) }}">{{ $sentence->sentence }}</a>
                </p>
                <footer class="blockquote-footer">
                    <strong>Page Id: </strong> <i>{{ $sentence->page_id }} </i> /
                    <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                </footer>
            </blockquote>
            
        @endforeach

    </div>

@endsection