@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h1>Project</h1>
        <h5 class="text-secondary">Populate the database</h5>
    </div>

    <hr>

    {{-- PROCESS UNIQUE JSON FILE --}}

    <form method="POST" action="/project/store" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-12">
                <a href="{{ asset('json_example.json') }}" target="blank">
                    <i class="fas fa-link"></i> JSON example file
                </a>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="json_file" name="json_file" value="{{ old('json_file') }}" required>
                    <label class="custom-file-label" for="json_file">Select a JSON file (recomended size of 2M)</label>
                </div>

                @error('json_file')
                    <p class="text-danger">{{ $errors->first('json_file') }}</p>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary btn-block" id="btn-json" onclick="start_loading(this)">Process JSON file</button>
            </div>

        </div>

    </form>

    <br>

    {{-- SAVE MULTIPLES PDF FILES --}}

    <form method="POST" action="/project/upload" enctype="multipart/form-data">
        @csrf

        <div class="form-row">

            <div class="form-group col-md-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="pdf_files" name="pdf_files[]" accept="pdf/*" multiple required>
                    <label class="custom-file-label" for="pdf_files">Select PDF files (max of 20 files)</label>
                </div>

                @if($errors->has('pdf_files.*'))
                    <p class="text-danger">{{ $errors->first('pdf_files.*') }}</p>
                @endif
            </div>

            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-secondary btn-block" id="btn-pdfs" onclick="start_loading(this)">Process PDF files</button>
            </div>

        </div>

    </form>

    <hr>

    {{-- DISPLAY RESPONSE --}}

    <div id="response-text">
        @if(isset($response))
            <div class="{{ Str::contains($response, 'ERROR') ? 'text-danger' : 'text-success' }}" role="alert"> {{ $response }} </div>

            @if(isset($pages) && isset($sentences))
                Total of {{ $pages }} pages inserted, with {{ $sentences }} sentences
            @endif
        @endif
    </div>

</div>
@endsection

@section('scripts')

    <script >
        /* show file value after file selected */
        document.getElementById('json_file').addEventListener('change',function(e){
            var fileName = document.getElementById("json_file").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        })

        /* show number of files selected */
        document.getElementById('pdf_files').addEventListener('change',function(e){
            var files = document.getElementById("pdf_files").files.length;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = files + " files selected";
        })

        function start_loading(OBJ) {
            if ((OBJ.id == 'btn-json' && $("#json_file").val() == "") || (OBJ.id == 'btn-pdfs' && $("#pdf_files").val() == ""))
                return ;

            OBJ.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';

            $("#response-text").html('<div class="text-danger" role="alert">Do not left the page! Wait until the process finish...</div>');
        };
    </script>

@endsection
