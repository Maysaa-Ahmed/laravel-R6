<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactusController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function submit(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        Mail::send([], [], function ($message) use ($validatedData) {
            $message->to('maysaa.ahmed94@gmail.com')
                ->subject($validatedData['subject'])
                ->setBody(
                    "Name: {$validatedData['name']}\n" .
                    "Email: {$validatedData['email']}\n\n" .
                    "Message:\n{$validatedData['message']}",
                    'text/plain'
                );
        });
        return redirect()->back()->with('success', 'Sent');
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
