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