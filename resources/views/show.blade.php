@extends('layout')

@section('title', 'User '. $user->name)

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col">
            <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to users</a>
        </div>
    </div>
    <div class="card" style="width: 20rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: {{ $user->id }}</li>
            <li class="list-group-item">Name: {{ $user->name }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Created: {{ $user->created_at->format('d.m.Y H:i:s') }}</li>
            <li class="list-group-item">Updeted: {{ $user->updated_at->format('d.m.Y H:i:s') }}</li>

        </ul>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col">
            <form method="post" action="{{route('users.destroy', $user)}}">
                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-primary">Edit</a>
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </div>

@endsection
