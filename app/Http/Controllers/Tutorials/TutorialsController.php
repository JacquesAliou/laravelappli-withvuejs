<?php

namespace App\Http\Controllers\Tutorials;

use App\Http\Controllers\Controller;
use App\Tutorial;
use Illuminate\Http\Request;

class TutorialsController extends Controller
{
    public function index()
    {
        return view('tutorials.tutorials', [
            'tutorials' => Tutorial::latest()->get(),
        ]);
    }
}
