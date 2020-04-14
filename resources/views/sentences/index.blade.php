@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Sentences</h1>
            <h5 class="text-secondary">
                {{ $sentences->total() }} sentences find
            </h5>
        </div>

        <hr>

        <ul class="list-group list-group-flush">

            @foreach ($sentences as $sentence)

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="mb-0">{{ $sentence->id }} -
                        <a href="{{ route('annotations.edit', $sentence) }}">{{ $sentence->sentence }}</a>
                    
                    <footer class="blockquote-footer">
                        <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                    </footer>
                    </div>
                    <p>Page: <i>{{ $sentence->page_id }} </i></p>
                </li>
                
            @endforeach

        </ul>

        <div class="d-flex justify-content-end">
            {{ $sentences->links() }}
        </div>

    </div>

@endsection