<?php

namespace App\Http\Controllers;

use App\Models\enotaris;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class enotariscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = enotaris::latest()->paginate(5);
        return view('notaris.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('notaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $this->validate($request,[
            'nama'     => 'required',
            'alamat'   => 'required',
            'email'    => 'required',
            'telepon' => 'required',
            'status' => 'required'

        ]);

        enotaris::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'status' => $request->status

        ]);
        return redirect()->route('notaris.index')->with(['Success' => 'Data Berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = enotaris::findOrFail($id);
        return view('notaris.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = enotaris::findOrFail($id);

        return \view('notaris.update', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id):RedirectResponse
    {
        $this->validate($request,[
            'nama'     => 'required',
            'alamat'   => 'required',
            'email'    => 'required',
            'telepon' => 'required',
            'status' => 'required'

        ]);
        $post = enotaris::findOrFail($id);
        $post->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'status' => $request->status

        ]);
        return redirect()->route('notaris.index')->with(['Success' => 'Data Berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = enotaris::findOrFail($id);
        $post->delete();
        return redirect()->route('notaris.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
