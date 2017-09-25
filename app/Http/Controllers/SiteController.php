<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $schedulings = \App\Scheduling::all();
        return view('index', compact('schedulings'));
    }

    public function doctors()
    {
        $doctors = \App\Doctor::all();

        return view('doctors', compact('doctors'));
    }

    public function patients()
    {
        $patients = \App\Patient::all();

        return view('patients', compact('patients'));
    }
}
