@extends('layout')

@section('title', isset($user) ? 'Update '. $user->name : 'Create user')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col">
            <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to users</a>
        </div>
    </div>

    <form method="POST"
          @if(isset($user))
              action="{{ route('users.update', $user) }}">
        @else
            action="{{ route('users.store') }}">
        @endif
        @csrf
            @isset($user)
                @method('PUT')
            @endisset
        <div class="row">
            <div class="col">
                <input name="name"
                       value="{{ isset($user) ? $user->name : '' }}"
                       type="text" class="form-control" placeholder="Name" aria-label="name">
            </div>
            <div class="col">
                <input name="email"
                       value="{{ isset($user) ? $user->email : '' }}"
                       type="text" class="form-control" placeholder="Email" aria-label="email">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>


    </form>
@endsection
