@extends('layout')

@section('content')

    <div class="container">

        <h1>Sentences</h1>


        @foreach ($sentences as $sentence)

            <blockquote class="blockquote">
                <p class="mb-0">{{ $sentence->page_id }} / {{ $sentence->id }} - {{ $sentence->sentence }}</p>
                <footer class="blockquote-footer">
                    <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                </footer>
            </blockquote>
            
        @endforeach

    </div>

@endsection