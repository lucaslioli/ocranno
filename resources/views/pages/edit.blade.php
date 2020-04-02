@extends('layout')

@section('content')
    
    <div class="container">
        <h1>New Document's Page</h1>

        <form method="POST" action="/pages/{{ $page->id }}" class="{{ $errors->first() ? 'was-validated' : '' }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="file_name">File name*</label>
                <input type="text" class="form-control" name="file_name" id="file_name" value="{{ $page->file_name }}" required>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="words_number">Number of words</label>
                    <input type="number" class="form-control" name="words_number" id="words_number" value="{{ $page->words_number }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="wrong_words">Number of wrong words*</label>
                    <input type="number" class="form-control" name="wrong_words" id="wrong_words" value="{{ $page->wrong_words }}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" name="year" id="year" value="{{ $page->year }}">
                </div>
            </div>

            <div class="form-group">
                <label for="btn_submit"></label>
                <button type="submit" class="btn btn-primary btn-block col-md-2" id="btn_submit">Create</button>
            </div>

        </form>
    </div>

@endsection