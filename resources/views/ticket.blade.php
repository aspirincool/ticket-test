@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="/" class="btn btn-primary mb-4">Home</a>
        @if(\App\User::where('id', $user_id)->first()['user_type'] != 'admin' && !$ticket->closed)
            <div class="row mb-4">
                <div class="col-md-4"><a href="/close/{{ $id }}" class="btn btn-primary">Close Ticket</a></div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">{{ $ticket->name }}</h4>
                @foreach($messages as $message)
                    @if(\App\User::where('id', $message->user_id)->first()['user_type'] != 'admin')
                        <div class="row justify-content-start">
                            <div style="padding: 0 15px;">
                                <div class="mb-1" style="padding: 15px; border-radius: 5px; background: rgba(54, 115, 212, 0.5); color: #fff;">
                                    {{ $message->text }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-end">
                            <div style="padding: 0 15px;">
                                <div class="mb-1" style="padding: 15px; border-radius: 5px; background: rgba(54, 212, 59, 0.5); color: #fff;">
                                    {{ $message->text }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if(!$ticket->closed)
                    <form action="/send-message" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="ticket_id" value="{{ $id }}">
                        <input type="text" name="message" class="form-control mb-2" required>
                        <input type="submit" class="btn btn-primary" value="Send Message">
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection