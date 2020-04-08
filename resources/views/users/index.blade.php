@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Users</h1>

        @foreach ($users as $user)

            <h3>
                {{ $user->id }} - {{ $user->name }}
                <small class="text-muted"><i>E-mail:</i> {{ $user->email }}</small>
            </h3>
            
        @endforeach

    </div>

@endsection