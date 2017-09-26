<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Scheduling;

class HomeController extends Controller
{
    public function index()
    {
        $schedulings = Scheduling::all();
        return view('admin.scheduling.index', compact('schedulings'));
    }
}
