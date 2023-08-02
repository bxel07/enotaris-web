<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class pengajuancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customer_id = $request->input('customer_id');

        if ($customer_id) {
            // If a search is performed, get the search results
            $datacustomer = pengajuan::where('id_customer', 'like', '%' . $customer_id . '%')->get();
            return view('admin.index', compact('datacustomer'));
        } else {
            // If no search, fetch all data to display
            $posts = pengajuan::latest()->paginate(5);
           $ktp = pengajuan::count('ktp');
           $npwp = pengajuan::count('npwp');
           $sertifikat = pengajuan::count('sertifikattanah');

           $result = [
               'valid' => 0,
               'inprogress' => 0,
               'jumlah' => $ktp + $npwp + $sertifikat
           ];
           foreach ($posts as $post) {

               // Count occurrences of status
               if ($post->status === 'valid') {
                   $result['valid']++;
               } elseif ($post->status === 'inprogress') {
                   $result['inprogress']++;
               }
           }
            return view('admin.index', compact('posts', 'result'));
        }



    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('pengajuan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_customer' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
            'jenis_perusahaan' => 'required',
            'jenis_pengajuan' => 'required',
            'ktp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'npwp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'sertifikattanah' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'status' => 'required',
        ]);

        // Request Dokumen file as document file
        $ktpPath = $request->file('ktp');
        $npwpPath = $request->file('npwp');
        $sertifikattanahPath = $request->file('sertifikattanah');

        if ($ktpPath !== null) {
            $ktpPath->storeAs('public/ktp', $ktpPath->hashName());
        }

        if ($npwpPath !== null) {
            $npwpPath->storeAs('public/npwp', $npwpPath->hashName());
        }

        if ($sertifikattanahPath !== null) {
            $sertifikattanahPath->storeAs('public/sertifikattanah', $sertifikattanahPath->hashName());
        }

        pengajuan::create([
            'id_customer' => $request->id_customer,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'jenis_pengajuan' => $request->jenis_pengajuan,
            'ktp' => $ktpPath !== null ? $ktpPath->hashName() : null,
            'npwp' => $npwpPath !== null ? $npwpPath->hashName() : null,
            'sertifikattanah' => $sertifikattanahPath !== null ? $sertifikattanahPath->hashName() : null,
            'status' => $request->status,
        ]);

        return redirect()->route('notaris.index')->with(['success' => 'Data customer berhasil disimpan!!']);
    }


    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        $posts = pengajuan::findOrFail($id);
//        return \view('pengajuan.show', compact('posts'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = pengajuan::findOrFail($id);
        return \view('pengajuan.editcustomer', compact('posts'));
    }

    public function editdokumen(string $id)
    {
        $posts = pengajuan::findOrFail($id);
        return \view('pengajuan.editdokumen', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_customer' => '',
            'nama' => '',
            'alamat' => '',
            'email' => '',
            'telepon' => '',
            'jenis_perusahaan' => '',
            'jenis_pengajuan' => '',
        ]);

        $post = pengajuan::findOrFail($id);
            // update data
            $post->update([
                'id_customer' => $request->id_customer,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'jenis_perusahaan' => $request->jenis_perusahaan,
                'jenis_pengajuan' => $request->jenis_pengajuan,

            ]);
            // melakukan redirect
            return redirect()->route('notaris.index')->with(['success' => 'Dokumen Berhasil Diupdate!']);

    }

    public function updatedokumen(Request $request, string $id)
    {
        $this->validate($request, [
            'ktp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'npwp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'sertifikattanah' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'status' => 'nullable'
        ]);

        $post = pengajuan::findOrFail($id);

        // Update the dokumen fields
        $ktpPath = $request->file('ktp');
        $npwpPath = $request->file('npwp');
        $sertifikattanahPath = $request->file('sertifikattanah');

        if ($ktpPath !== null) {
            Storage::delete('public/ktp/' . $post->ktp); // Delete the old file
            $ktpPath->storeAs('public/ktp', $ktpPath->hashName()); // Store the new file
            $post->ktp = $ktpPath->hashName();
        }

        if ($npwpPath !== null) {
            Storage::delete('public/npwp/' . $post->npwp);
            $npwpPath->storeAs('public/npwp', $npwpPath->hashName());
            $post->npwp = $npwpPath->hashName();
        }

        if ($sertifikattanahPath !== null) {
            Storage::delete('public/sertifikattanah/' . $post->sertifikattanah);
            $sertifikattanahPath->storeAs('public/sertifikattanah', $sertifikattanahPath->hashName());
            $post->sertifikattanah = $sertifikattanahPath->hashName();
        }

        $post->status = $request->status;
        $post->save();

        return redirect()->route('notaris.index')->with(['success' => 'Dokumen Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $post = pengajuan::findOrFail($id);
        //delete dokumen
        // Delete the associated files
        if ($post->ktp) {
            Storage::delete('public/ktp/' . $post->ktp);
        }

        if ($post->npwp) {
            Storage::delete('public/npwp/' . $post->npwp);
        }

        if ($post->sertifikattanah) {
            Storage::delete('public/sertifikattanah/' . $post->sertifikattanah);
        }

        $post->delete();
        return redirect()->route('notaris.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
