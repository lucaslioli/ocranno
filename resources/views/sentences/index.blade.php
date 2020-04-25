@extends('layouts.app')

@section('include')
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
@endsection

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Sentences</h1>
            <h5 class="text-secondary">
                {{ $sentences->total() }} sentences find
            </h5>
        </div>

        <hr>

        <form method="GET" action="{{ route('sentences.search') }}">
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

        <div id="response" role="alert"></div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sentence</th>
                    <th scope="col">Word</th>
                    <th scope="col">Observations</th>
                    <th scope="col" class="text-center">Page</th>
                    <th scope="col" class="text-center s-actions">Actions</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($sentences as $sentence)

                <tr id="tr-{{ $sentence->id }}">
                    <td>{{ $sentence->id }}</td>
                    <td>
                        {{ Str::of($sentence->sentence)->limit(120) }}
                    
                        <footer class="blockquote-footer">
                            <strong>Correction:</strong> <i>{{ $sentence->correction }}</i>
                        </footer>
                    </td>
                    <td class="text-muted">
                        {{ Str::of($sentence->word)->limit(20) }}
                    </td>
                    <td class="text-muted">
                        {{ Str::of($sentence->observation)->limit(20) }}
                    </td>
                    <td class="text-muted text-center">{{ $sentence->page_id }}</td>
                    <td class="text-center">
                        <a href="{{ route('annotations.edit', $sentence) }}" class="btn btn-sm btn-outline-secondary" title="Edit annotation">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('sentences.destroy', $sentence) }}" class="btn btn-sm btn-outline-danger" 
                            id="deleteSentence" data-id="{{ $sentence->id }}" title="Delete sentence">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                
            @endforeach

            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $sentences->links() }}
        </div>

    </div>

@endsection

@section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function () {

            $("body").on("click", "#deleteSentence", function(e){

                if(!confirm("Do you really want to do this?")) {
                    return false;
                }

                e.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: this.href, //or use url: "sentence/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){
                        $("#response").removeClass("alert alert-danger");
                        $("#response").addClass("alert alert-success");
                        $("#response").html(response);
                        $("#tr-"+id).remove();
                    }
                });
                return false;
            });
            

        });
    </script>

@endsection