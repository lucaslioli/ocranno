@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>My annotations</h1>

        @forelse ($sentences as $sentence)

            <blockquote class="blockquote">
                <p class="mb-0">{{ $sentence->id }} -
                    <a href="{{ route('annotations.edit', $sentence) }}">{{ $sentence->sentence }}</a>
                </p>
                <footer class="blockquote-footer">
                    <strong>Page Id: </strong> <i>{{ $sentence->page_id }} </i> /
                    <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                </footer>
            </blockquote>

        @empty

            <div class="alert alert-primary" role="alert">
                <i class="fas fa-ban"></i> No annotations have been made yet.
            </div>
            
        @endforelse

    </div>

@endsection