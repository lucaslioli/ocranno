@extends('layouts.app')

@section('include')
    <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
@endsection

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Pages</h1>
            <h5 class="text-secondary">
                {{ $pages->total() }} pages find
            </h5>
        </div>

        <hr>

        <form method="GET" action="{{ route('pages.search') }}">
            <div class="row">

                <div class="col-md-10">
                    <input type="text" name="query" id="query" class="form-control" placeholder="Enter an ID or part of file name..." value="{{ old('query') }}">
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
                    <th scope="col">File name</th>
                    <th scope="col" class="text-center">Words</th>
                    <th scope="col" class="text-center">Errors</th>
                    <th scope="col" class="text-center">User</th>
                    <th scope="col" class="text-center">Annotations</th>
                    <th scope="col" class="text-center action-column">Actions</th>
                </tr>
            </thead>
            <tbody>

            @forelse ($pages as $page)

                <tr>
                    <th scope="row">{{ $page->id }}</th>
                    <td>
                        @if(file_exists(public_path()."/pdfs/".$page->file_name))
                            <a href="/pdfs/{{ $page->file_name }}" target="blank">{{ Str::of($page->file_name)->limit(100) }}</a>
                        @else
                            {{ Str::of($page->file_name)->limit(75) }}
                        @endif
                    </td>
                    <td class="text-muted text-center">{{ $page->words_number }}</td>
                    <td class="text-muted text-center">{{ $page->wrong_words }}</td>
                    <td class="text-muted text-center">{{ $page->user_id }}</td>
                    <td class="text-center">
                        @if ($page->annotations == $page->wrong_words)
                            <span class="badge badge-success badge-pill">Complete</span>
                        @else
                            <span class="badge badge-{{ $page->annotations ? 'primary' : 'secondary' }} badge-pill">{{ $page->annotations }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pages.show', $page->id) }}" class="btn btn-sm btn-outline-secondary" title="List sentences">
                            <i class="fas fa-list"></i>
                        </a>

                        @if($page->illegible)
                            <a href="{{ route('pages.illegible', $page) }}" class="btn btn-sm btn-secondary" title="Set page as legible">
                                <i class="fas fa-eye"></i>
                            </a>
                        @else
                            <a href="{{ route('pages.illegible', $page) }}" class="btn btn-sm btn-outline-secondary" title="Set page as illegible">
                                <i class="fas fa-eye-slash"></i>
                            </a>
                        @endif

                        <a href="{{ route('pages.destroy', $page) }}" class="btn btn-sm btn-outline-danger" 
                            id="deletePage" data-id="{{ $page->id }}" title="Delete page">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <i class="fas fa-ban"></i> No pages found.
                    </td>
                </tr>
                
            @endforelse

            </tbody>
        </table>
        

        <div class="d-flex justify-content-end">
            {{ $pages->links() }}
        </div>

    </div>

@endsection

@section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function () {

            $("#deletePage").on("click", function(e){

                if(!confirm("Do you really want to do this?")) {
                    return false;
                }

                e.preventDefault();
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: this.href, //or use url: "page/"+id,
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