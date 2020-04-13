@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-database"></i> 
        @if (isset($msg))
            {{ $msg }}
        @else
            Sorry, no registers find in the database.
        @endif
    </div>
</div>
@endsection
