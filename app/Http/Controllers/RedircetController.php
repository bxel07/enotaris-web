<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedircetController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/superadmin');
        } else {
            return redirect('/pegawai');
        }
    }
}
