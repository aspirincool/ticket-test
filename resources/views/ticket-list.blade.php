@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="/" class="btn btn-primary mb-4">Home</a>
        @if($user_type != 'admin')
            <div class="row mb-4">
                <div class="col-md-4">
                    <form action="/newticket/{{ $user_id }}" method="post">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="New Ticket">
                    </form>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Tickets</h4>
                @foreach($tickets as $ticket)
                    <a href="/ticket/{{ $user_id }}/{{ $ticket->id }}" class="btn @if($ticket->closed) btn-secondary @else btn-primary @endif">{{ $ticket->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

@endsection