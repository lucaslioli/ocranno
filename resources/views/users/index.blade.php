@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1>Users</h1>
            <h5 class="text-secondary">
                {{ $users->total() }} registered users
            </h5>
        </div>

        <hr>

        @foreach ($users as $user)

            <h3>
                {{ $user->id }} - {{ $user->name }}
                <small class="text-muted"><i>E-mail:</i> {{ $user->email }}</small>
            </h3>
            
        @endforeach

        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>

    </div>

@endsection