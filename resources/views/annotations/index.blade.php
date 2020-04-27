@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>My annotations</h1>
            <h5 class="text-secondary">
                {{ $sentences->total() }} sentences annotated
            </h5>
        </div>

        <hr>

        <form method="GET" action="{{ route('annotations.search') }}">
            <div class="row">

                <div class="col-md-10">
                    <input type="text" name="query" id="query" class="form-control" placeholder="Enter an ID, part of sentence or page ID..." value="{{ old('query') }}">
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary btn-block" id="btn-search"><i class="fas fa-search"></i> Search</button>
                </div>

            </div>
        </form>

        <br>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sentence</th>
                    <th scope="col">Observations</th>
                    <th scope="col" class="text-center">Page ID</th>
                    <th scope="col" class="text-center s-actions">Actions</th>
                </tr>
            </thead>
            <tbody>

            @forelse ($sentences as $sentence)

                <tr id="tr-{{ $sentence->id }}">
                    <td>{{ $sentence->id }}</td>
                    <td>
                        {{ Str::of($sentence->sentence)->limit(120) }}
                    
                        <footer class="blockquote-footer">
                            <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                        </footer>
                    </td>
                    <td class="text-muted">
                        {{ Str::of($sentence->observation)->limit(20) }}
                    </td>
                    <td class="text-muted text-center">{{ $sentence->page_id }}</td>
                    <td class="text-center">
                        <a href="{{ route('annotations.edit', $sentence) }}" class="btn btn-sm btn-outline-secondary" title="Edit annotation">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        <i class="fas fa-ban"></i> No annotations have been made yet.
                    </td>
                </tr>
                
            @endforelse

            </tbody>

        </table>

        <div class="d-flex justify-content-end">
            {{ $sentences->links() }}
        </div>

    </div>

@endsection