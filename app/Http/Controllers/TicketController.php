<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    function index()
    {
        return view('admin.index', [
            'active' => 'ticket',
        ]);
    }

    function add()
    {
        return view('admin.add', [
            'active' => 'ticket',
        ]);
    }

    function store(Request $request)
    {
        // Validate and store the ticket data
        // Redirect or return a response
    }

    function update(Request $request, $id)
    {
        // Validate and update the ticket data
        // Redirect or return a response
    }

    function destroy(Request $request, $id)
    {
        // Validate and delete the ticket data
        // Redirect or return a response
    }
}
