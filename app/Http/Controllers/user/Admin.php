<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\dokumen;
use App\Models\pengajuan_data;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $customer_id = $request->input('customer_id');

        // If no search, fetch all data to display
        $posts = pengajuan_data::latest()->paginate(5);

        $ktp = dokumen::count('ktp');
        $npwp = dokumen::count('npwp');
        $kk = dokumen::count('kk');

        $result = [
            'valid' => 0,
            'inprogress' => 0,
            'jumlah' => $ktp + $npwp + $kk
        ];
        foreach ($posts as $post) {

            // Count occurrences of status
            if ($post->status === 'valid') {
                $result['valid']++;
            } elseif ($post->status === 'onprogress') {
                $result['inprogress']++;
            }
        }

        if ($customer_id) {
            // If a search is performed, get the search results
            $datacustomer = pengajuan::where('id_customer', 'like', '%' . $customer_id . '%')->get();

            return view('admin/index', compact('datacustomer', 'result'));
        } else {
            return view('admin/index', compact('posts', 'result'));
        }
    }
}
