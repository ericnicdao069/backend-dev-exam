<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VideoController extends Controller
{
    public function videos(Request $request)
    {
        return Inertia::render('Videos');
    }
}
