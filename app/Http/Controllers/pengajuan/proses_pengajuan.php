<?php

namespace App\Http\Controllers\pengajuan;

use App\Models\data_cv;
use App\Models\pemberi_kuasa;
use App\Models\pemohon;
use App\Models\pengajuan_data;
use App\Models\dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class proses_pengajuan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuan_data.create_cv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'id_customer' => 'required',
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'telepon' => 'required',
                'kategori_perusahaan' => 'required',
                'jenis_pengajuan' => 'required',
                'status' => 'required',

                //tabel pemohon
                'nama1' => 'required',
                'tmp_lahir1' => 'required',
                'Tgl_lahir1' => 'required|date',
                'alamat1' => 'required',
                'pekerjaan1' => 'required',
                'no_ktp1' => 'required',

                'nama2' => 'required',
                'tmp_lahir2' => 'required',
                'Tgl_lahir2' => 'required|date',
                'alamat2' => 'required',
                'pekerjaan2' => 'required',
                'no_ktp2' => 'required',

                'nama3' => 'required',
                'tmp_lahir3' => 'required',
                'Tgl_lahir3' => 'required|date',
                'alamat3' => 'required',
                'pekerjaan3' => 'required',
                'no_ktp3' => 'required',

                //tabel pemberi kuasa
                'pemilik_kuasa' => 'required',
                'tempat_lahir_pemilik_kuasa' => 'required',
                'tgl_lahir_pemilik_kuasa' => 'required|date',
                'alamat_pemilik_kuasa' => 'required',
                'no_ktp_pemilik_kuasa' => 'required',

                // tabel_data_cv
                'nama_cv' => 'required',
                'alamat_cv' => 'required',
                'bidang_usaha' => 'required',
                'modal' => 'required',
                'persero_aktif' => 'required',
                'persero_pasif' => 'required',

                // tabel dokumen
                'ktp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
                'npwp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
                'kk' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            ]);
        } catch (ValidationException $e) {
            echo $e->getMessage();
        }

        // convert array to one line string
        $data = $request->input('bidang_usaha');
        $dataArray = is_array($data) ? $data : [];
        $arrayimplode = implode(', ', $dataArray);

        //logic pengelolaan data dokumen
        // Request Dokumen file as document file
        $ktpPath = $request->file('ktp');
        $npwpPath = $request->file('npwp');
        $kk = $request->file('kk');

        if ($ktpPath !== null) {
            $ktpPath->storeAs('public/ktp', $ktpPath->hashName());
        }

        if ($npwpPath !== null) {
            $npwpPath->storeAs('public/npwp', $npwpPath->hashName());
        }

        if ($kk !== null) {
            $kk->storeAs('public/kk', $kk->hashName());
        }

        $pengajuan_data = pengajuan_data::create([
            'id_customer' => $request->id_customer,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kategori_perusahaan' => $request->kategori_perusahaan,
            'jenis_pengajuan' => $request->jenis_pengajuan,
            'status' => $request->status,

        ]);

        $data_pemohon = new pemohon([
            //tabel pemohon
            'id_pengajuan' => $pengajuan_data->id,
            'nama1' => $request->nama1,
            'tmp_lahir1' => $request->tmp_lahir1,
            'Tgl_lahir1' => $request->Tgl_lahir1,
            'alamat1' => $request->alamat1,
            'pekerjaan1' => $request->pekerjaan1,
            'no_ktp1' => $request->no_ktp1,

            'nama2' => $request->nama2,
            'tmp_lahir2' => $request->tmp_lahir2,
            'Tgl_lahir2' => $request->Tgl_lahir2,
            'alamat2' => $request->alamat2,
            'pekerjaan2' => $request->pekerjaan2,
            'no_ktp2' => $request->no_ktp2,

            'nama3' => $request->nama3,
            'tmp_lahir3' => $request->tmp_lahir3,
            'Tgl_lahir3' => $request->Tgl_lahir3,
            'alamat3' => $request->alamat3,
            'pekerjaan3' => $request->pekerjaan3,
            'no_ktp3' => $request->no_ktp3,
        ]);

        $data_pemohon->save();

        $pemberi_kuasa = new pemberi_kuasa([
            //tabel pemberi kuasa
            'id_pengajuan' => $pengajuan_data->id,
            'pemilik_kuasa' => $request->pemilik_kuasa,
            'tempat_lahir_pemilik_kuasa' => $request->tempat_lahir_pemilik_kuasa,
            'tgl_lahir_pemilik_kuasa' => $request->tgl_lahir_pemilik_kuasa,
            'alamat_pemilik_kuasa' => $request->alamat_pemilik_kuasa,
            'no_ktp_pemilik_kuasa' => $request->no_ktp_pemilik_kuasa,
        ]);

        $pemberi_kuasa->save();

        $data_cv = new data_cv([
            'id_pengajuan' => $pengajuan_data->id,
            'nama_cv' => $request->nama_cv,
            'alamat_cv' => $request->alamat_cv,
            'bidang_usaha' => $arrayimplode,
            'modal' => $request->modal,
            'persero_aktif' => $request->persero_aktif,
            'persero_pasif' => $request->persero_pasif,
        ]);

        $data_cv->save();

        $data_dokumen = new dokumen([
            'id_pengajuan' => $pengajuan_data->id,
            'ktp' => $ktpPath !== null ? $ktpPath->hashName() : null,
            'npwp' => $npwpPath !== null ? $npwpPath->hashName() : null,
            'kk' => $kk !== null ? $kk->hashName() : null,
        ]);

        $data_dokumen->save();
        return redirect()->route('notaris.index')->with(['success' => 'Data customer berhasil disimpan!!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajuan = pengajuan_data::with('pemohon','pemberi_kuasa','data_cv', 'dokumen')->find($id);

        $pengajuanArray = $pengajuan->toArray();
        $pemohonArray = $pengajuan->pemohon->toArray();
        $pemberiKuasaArray = $pengajuan->pemberi_kuasa->toArray();
        $dataCvArray = $pengajuan->data_cv->toArray();
        $dokumenArray = $pengajuan->dokumen->toArray();

        $mergedArray = array_merge(
            $pengajuanArray,
            ['pemohon' => $pemohonArray],
            ['pemberi_kuasa' => $pemberiKuasaArray],
            ['data_cv' => $dataCvArray],
            ['dokumen' => $dokumenArray]
        );
        $data = (object) $mergedArray;


        return view('pengajuan_data.edit_cv', compact('data'));



    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'id_customer' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
            'kategori_perusahaan' => 'required',
            'jenis_pengajuan' => 'required',
            'status' => 'required',

            //tabel pemohon
            'nama1' => 'required',
            'tmp_lahir1' => 'required',
            'Tgl_lahir1' => 'required|date',
            'alamat1' => 'required',
            'pekerjaan1' => 'required',
            'no_ktp1' => 'required',

            'nama2' => 'required',
            'tmp_lahir2' => 'required',
            'Tgl_lahir2' => 'required|date',
            'alamat2' => 'required',
            'pekerjaan2' => 'required',
            'no_ktp2' => 'required',

            'nama3' => 'required',
            'tmp_lahir3' => 'required',
            'Tgl_lahir3' => 'required|date',
            'alamat3' => 'required',
            'pekerjaan3' => 'required',
            'no_ktp3' => 'required',

            //tabel pemberi kuasa
            'pemilik_kuasa' => 'required',
            'tempat_lahir_pemilik_kuasa' => 'required',
            'tgl_lahir_pemilik_kuasa' => 'required|date',
            'alamat_pemilik_kuasa' => 'required',
            'no_ktp_pemilik_kuasa' => 'required',

            // tabel_data_cv
            'nama_cv' => 'required',
            'alamat_cv' => 'required',
            'bidang_usaha' => 'required',
            'modal' => 'required',
            'persero_aktif' => 'required',
            'persero_pasif' => 'required',

            // tabel dokumen
            'ktp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'npwp' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
            'kk' => 'mimetypes:application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|max:10240',
        ]);


            //convert array to one line string
        $data = $request->input('bidang_usaha');
        $dataArray = is_array($data) ? $data : [];
        $arrayimplode = implode(', ', $dataArray);

        $pengajuan = pengajuan_data::findOrFail($id);
        $data_cv = $pengajuan->data_cv();
        $document = $pengajuan->dokumen()->get();


        $data = [];
        foreach ($document as $comment) {
           $data = [
             'ktp' => $comment->ktp,
             'npwp' => $comment->npwp,
             'kk' => $comment->kk
           ];
        }



        //Update the dokumen fields
        $ktpPath = $request->file('ktp');
        $npwpPath = $request->file('npwp');
        $kk = $request->file('kk');

        if ($ktpPath !== null) {
            Storage::delete('public/ktp/' . $data['ktp']); // Delete the old file
            $ktpPath->storeAs('public/ktp', $ktpPath->hashName()); // Store the new file
        }

        if ($npwpPath !== null) {
            Storage::delete('public/npwp/' . $data['npwp']);
            $npwpPath->storeAs('public/npwp', $npwpPath->hashName());
        }

        if ($kk !== null) {
            Storage::delete('public/kk/' . $data['kk']);
            $kk->storeAs('public/kk', $kk->hashName());
        }



        $pengajuan->update([
            'id_customer' => $request->id_customer,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kategori_perusahaan' => $request->kategori_perusahaan,
            'jenis_pengajuan' => $request->jenis_pengajuan,
            'status' => $request->status,
        ]);


        $pengajuan->pemohon()->update([
            'nama1' => $request->nama1,
            'tmp_lahir1' => $request->tmp_lahir1,
            'Tgl_lahir1' => $request->Tgl_lahir1,
            'alamat1' => $request->alamat1,
            'pekerjaan1' => $request->pekerjaan1,
            'no_ktp1' => $request->no_ktp1,

            'nama2' => $request->nama2,
            'tmp_lahir2' => $request->tmp_lahir2,
            'Tgl_lahir2' => $request->Tgl_lahir2,
            'alamat2' => $request->alamat2,
            'pekerjaan2' => $request->pekerjaan2,
            'no_ktp2' => $request->no_ktp2,

            'nama3' => $request->nama3,
            'tmp_lahir3' => $request->tmp_lahir3,
            'Tgl_lahir3' => $request->Tgl_lahir3,
            'alamat3' => $request->alamat3,
            'pekerjaan3' => $request->pekerjaan3,
            'no_ktp3' => $request->no_ktp3,
        ]);


        $pengajuan->pemberi_kuasa()->update([
            'pemilik_kuasa' => $request->pemilik_kuasa,
            'tempat_lahir_pemilik_kuasa' => $request->tempat_lahir_pemilik_kuasa,
            'tgl_lahir_pemilik_kuasa' => $request->tgl_lahir_pemilik_kuasa,
            'alamat_pemilik_kuasa' => $request->alamat_pemilik_kuasa,
            'no_ktp_pemilik_kuasa' => $request->no_ktp_pemilik_kuasa,
        ]);

        $data_cv->update([
            'nama_cv' => $request->nama_cv,
            'alamat_cv' => $request->alamat_cv,
            'bidang_usaha' => $arrayimplode,
            'modal' => $request->modal,
            'persero_aktif' => $request->persero_aktif,
            'persero_pasif' => $request->persero_pasif,
        ]);

        // codition update document code
        try {
            if (isset($ktpPath)) {
                $pengajuan->dokumen()->update([
                    'ktp' => $ktpPath !== null ? $ktpPath->hashName() : null,
                ]);
            }

            if (isset($npwpPath)) {
                $pengajuan->dokumen()->update([
                    'npwp' => $npwpPath !== null ? $npwpPath->hashName() : null,
                ]);
            }

            if (isset($kk)) {
                $pengajuan->dokumen()->update([
                    'kk' => $kk !== null ? $kk->hashName() : null,
                ]);
            }
        } catch (Exception $e) {
            echo "error".$e->getMessage();
        }

        return redirect()->route('notaris.index')->with(['success' => 'data berhasil diupdate']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengajuan = pengajuan_data::with('pemohon', 'pemberi_kuasa', 'data_cv', 'dokumen')->find($id);
        $delete = pengajuan_data::findOrFail($id);
        $document = $delete->dokumen()->get();

        $data = [];
        foreach ($document as $comment) {
            $data = [
                'ktp' => $comment->ktp,
                'npwp' => $comment->npwp,
                'kk' => $comment->kk
            ];
        }

        //Running delete data on local storage
        if ($data['ktp']) {
            Storage::delete('public/ktp/' . $data['ktp']);
        }

        if ($data['npwp']) {
            Storage::delete('public/npwp/' . $data['npwp']);
        }

        if ($data['kk']) {
            Storage::delete('public/kk/' . $data['kk']);
        }

        $pengajuan->deleteOrFail();
        return redirect()->route('notaris.index')->with(['success' => 'data berhasil dihapus']);
    }
}
