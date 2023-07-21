<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class dokumencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = dokumen::latest()->paginate(5);
        return \view('dokumen.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $this->validate($request,[
            'ktp' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'npwp' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'sertifikattanah' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
        ]);

        // upload dokumen
        $ktp = $request->file('ktp');
        $ktp->storeAs('public/ktp', $ktp->hashName());
        $npwp = $request->file('npwp');
        $npwp->storeAs('public/npwp', $npwp->hashName());
        $sertifikattanah = $request->file('sertifikattanah');
        $sertifikattanah->storeAs('public/sertifikattanah', $sertifikattanah->hashName());

        dokumen::create([
           'ktp' => $ktp->hashName(),
           'npwp' => $npwp->hashName(),
           'sertifikattanah' => $sertifikattanah->hashName()
        ]);
        return redirect()->route('dokumen.index')->with(['success' => 'Dokumen Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = dokumen::findOrFail($id);
        return \view('dokumen.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = dokumen::findOrFail($id);
        return \view('dokumen.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi dokumen
        $this->validate($request,[
            'ktp' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'npwp' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'sertifikattanah' => 'required|mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
        ]);

        // fetch data yang mau di update
        $post = dokumen::findOrFail($id);

        //check requirement file
        if ($request->hasFile('ktp') || $request->hasFile('npwp') || $request->hasFile('sertifikattanah')) {
            $ktp = $request->file('ktp');
            $ktp->storeAs('public/npwp', $ktp->hashName());
            $npwp = $request->file('npwp');
            $npwp->storeAs('public/npwp', $npwp->hashName());
            $sertifikattanah= $request->file('sertifikattanah');
            $sertifikattanah->storeAs('public/sertifikattanah');

            //delete data lama
            Storage::delete('public/ktp', $post->ktp);
            Storage::delete('public/npwp', $post->npwp);
            Storage::delete('public/sertifikattanah', $post->sertifikattanah);

            // update data
            $post->update([
                'ktp' => $ktp->hashName(),
                'npwp' => $npwp->hashName(),
                'sertifikattanah' => $sertifikattanah->hashName()
            ]);

            // melakukan redirect
            return redirect()->route('dokumen.index')->with(['success' => 'Dokumen Berhasil Diupdate!']);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $post = dokumen::findOrFail($id);
        //delete dokumen
        Storage::delete('public/ktp/'. $post->ktp);
        Storage::delete('public/npwp/'. $post->npwp);
        Storage::delete('public/sertifikattanah/'. $post->sertifikattanah);
        $post->delete();
        return redirect()->route('dokumen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
