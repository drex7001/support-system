<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Mail\ClientAcknowledgement;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReplyRequest $request, Ticket $ticket)
    {
        $reply = Reply::create([
            'ticket_id' => $ticket->id,
            'message' => $request->message,
        ]);

        $ticket->status = 'closed';
        // dd($ticket);
        $ticket->save();

        Mail::to($ticket->email)->send(new ClientAcknowledgement($reply,$ticket));

        return redirect()->route('tickets.show', $ticket->reference_number)->with('message', 'Reply created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
