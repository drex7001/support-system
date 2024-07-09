<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create([
            'reference_number' => Str::uuid(),
            'customer_name' => $request->customer_name,
            'problem_description' => $request->problem_description,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 'close',
        ]);

        // Mail::to($ticket->email)->send(new \App\Mail\TicketAcknowledgement($ticket));

        return redirect()->route('tickets.create')->with('message', 'Ticket created successfully. Your reference number is ' . $ticket->reference_number);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
