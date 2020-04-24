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

        <form method="GET" action="{{ route('users.search') }}">
            <div class="row">

                <div class="col-md-10">
                    <input type="text" name="query" id="query" class="form-control" placeholder="Enter an ID, user name or e-mail..." value="{{ old('query') }}">
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
                    <th scope="col">User name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center">Annotations</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($users as $user)

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="text-muted">{{ $user->email }}</td>
                    <td class="text-center">
                        <span class="badge badge-{{ $user->annotations ? 'primary' : 'secondary' }} badge-pill">{{ $user->annotations }}</span>
                    </td>
                </tr>
                
            @endforeach

            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $users->links() }}
        </div>

    </div>

@endsection