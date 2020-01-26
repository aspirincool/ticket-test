<?php

namespace App\Http\Controllers;

use App\Message;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showUsers()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function showUser($user_id) {
        $user_type = User::where('id', $user_id)->first()['user_type'];
        if($user_type == 'user') {
            $tickets = Ticket::where('user_id', $user_id)->get();
        }
        else $tickets = Ticket::all();
        return view('ticket-list', compact('tickets', 'user_id', 'user_type'));
    }

    public function addTicket($user_id) {
        $ticket = new Ticket;
        $ticket->user_id = $user_id;
        $ticket->name = 'Ticket '.(Ticket::orderby('id', 'desc')->first()['id'] + 1);
        $ticket->save();
        return redirect('/user/'.$user_id);
    }

    public function showTicket($user_id, $id) {
        $messages = Message::where('ticket_id', $id)->get();
        $ticket = Ticket::where('id', $id)->first();
        return view('ticket', compact('messages', 'id', 'user_id', 'ticket'));
    }

    public function closeTicket($id) {
        $ticket = Ticket::where('id', $id)->first();
        $ticketUser = $ticket->user_id;
        $ticket->closed = 1;
        $ticket->save();
        return redirect('/user/'.$ticketUser);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
