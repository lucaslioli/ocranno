@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="justify-content-between align-items-center">
            <h1>Sentences</h1>
            <h5 class="text-secondary">
                {{ $sentences->total() }} sentences find
            </h5>
        </div>

        <hr>

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

        <div class="justify-content-end">
            {{ $sentences->links() }}
        </div>

    </div>

@endsection