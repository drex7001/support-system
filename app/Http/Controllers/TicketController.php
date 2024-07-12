<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Mail\SendReferenceToClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

        Mail::to($ticket->email)->send(new SendReferenceToClient($ticket));

        return redirect()->route('tickets.create')->with('message', 'Ticket created successfully. Your reference number is ' . $ticket->reference_number);
    }

    /**
     * Display the specified resource.
     */
    public function show($reference_number)
    {
        $ticket = Ticket::where('reference_number', $reference_number)->first();
        return view('tickets.show', compact('ticket'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'reference_number' => 'required',
        ]);

        $reference_number = $request->input('reference_number');

        $ticket = Ticket::where('reference_number', $reference_number)->first();

        if ($ticket) {
            return view('tickets.show', compact('ticket'));
        } else {
            return redirect()->back()->with('error', 'No ticket found for the provided reference number.');
        }
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
