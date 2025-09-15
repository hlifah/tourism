<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    // Show all accommodations
    public function index()
    {
        return view('accommodations.index');
    }

    // Show individual accommodation
    public function show($name)
    {
        return view('accommodations.show', compact('name'));
    }
}
