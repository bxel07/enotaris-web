<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class landing extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
}
