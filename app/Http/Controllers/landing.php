<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pengajuan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class landing extends Controller
{
    public function index() {
        return \view('landing.index');
    }

    public function tracking() {
        return \view('landing.tracking');
    }
    public function dotracking(Request $request) {
        // Validate the input data to make sure 'id_customer' is provided
        $request->validate([
            'id_customer' => 'required'
        ]);

        // Retrieve the 'id_customer' from the request
        $customer = $request->input('id_customer');

        // Use Eloquent (assuming 'Pengajuan' is the corresponding model for the 'pegawais' table)
        $pegawai = pengajuan::where('id_customer', 'like', '%' . $customer . '%')->get();
        $results = [];
        foreach ($pegawai as $item) {
            $dokumens = [];
            if (empty($item->ktp)) {
                $dokumens[] = 'KTP not uploaded or required';
            }
            if (empty($item->npwp)) {
                $dokumens[] = 'NPWP not uploaded or required';
            }
            if (empty($item->sertifikattanah)) {
                $dokumens[] = 'Sertifikat Tanah not uploaded or required';
            }
            if (empty($dokumens)) {
                $dokumens[] = 'All documents uploaded';
            }
            $results[] = [
                'id_customer' => $item->id_customer,
                'dokumens' => $dokumens,
                'status' => $item->status,
                'updated_at' => $item->updated_at,

            ];
        }

        // Pass the results to the view
        return view('landing.tracking-after', compact('results'));
    }
}

