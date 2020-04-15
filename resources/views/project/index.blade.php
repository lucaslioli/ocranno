@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h1>Project</h1>
        <h5 class="text-secondary">Populate the database</h5>
    </div>

    <hr>

    <form method="POST" action="/project" enctype="multipart/form-data">
        @csrf

        <div class="form-row">

            <div class="form-group col-md-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="json_file" name="json_file" value="{{ old('json_file') }}" required>
                    <label class="custom-file-label" for="json_file">Select a JSON file</label>
                </div>

                @error('json_file')
                    <p class="text-danger">{{ $errors->first('json_file') }}</p>
                @enderror
            </div>

            <div class="form-group col-md-6">

                <button type="submit" class="btn btn-primary btn-block" onclick="launch_progressbar()">Process files and populate</button>

            </div>

        </div>

    </form>

    <div id="progress" class="progress"></div>

    @if(isset($response))
        <hr>
        <div class="{{ Str::contains($response, 'ERROR') ? 'text-danger' : 'text-success' }}" role="alert"> {{ $response }} </div>

        @if(isset($pages) && isset($sentences))
            Total of {{ $pages }} pages inserted, with {{ $sentences }} sentences
        @endif
    @endif

</div>
@endsection

@section('scripts')

    <script >
        /* show file value after file select */
        document.querySelector('.custom-file-input').addEventListener('change',function(e){
            var fileName = document.getElementById("json_file").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        })

        function launch_progressbar() {
            document.getElementById('progress').innerHTML = '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
        };
    </script>

@endsection
