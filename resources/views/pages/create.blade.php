@extends('layout')

@section('content')
    
    <div class="container">
        <h1>New Document's Page</h1>

        <form method="POST" action="/pages" class="{{ $errors->first() ? 'was-validated' : '' }}">
            @csrf

            <div class="form-group">
                <label for="file_name">File name*</label>
                <input type="text" class="form-control" name="file_name" id="file_name" placeholder="documentpage.pdf" required
                    value="{{ old('file_name')}}">
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="words_number">Number of words*</label>
                    <input type="number" class="form-control" name="words_number" id="words_number" placeholder="999" required
                        {{ old('words_number') }}>
                </div>
                <div class="form-group col-md-4">
                    <label for="wrong_words">Number of wrong words*</label>
                    <input type="number" class="form-control" name="wrong_words" id="wrong_words" placeholder="99" required
                        {{ old('wrong_words') }}>
                </div>
                <div class="form-group col-md-4">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" name="year" id="year" placeholder="2020" {{ old('year') }}>
                </div>
            </div>

            <div class="form-group">
                <label for="btn_submit"></label>
                <button type="submit" class="btn btn-primary btn-block col-md-2" id="btn_submit">Create</button>
            </div>

        </form>

    </div>

@endsection