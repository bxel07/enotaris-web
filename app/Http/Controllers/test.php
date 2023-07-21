<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enotaris;

class test extends Controller
{
    public function index() {
        $post = enotaris::latest()->get();
        echo "<pre>";
        var_dump($post);
    }
}
