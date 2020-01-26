@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-4">
                    <a href="/user/{{ $user->id }}" class="btn btn-primary" style="width:100%;">{{ $user->name }}</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection