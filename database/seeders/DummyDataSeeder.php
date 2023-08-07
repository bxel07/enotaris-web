<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\pengajuan_data;
use App\Models\pemohon;
use App\Models\pemberi_kuasa;
use App\Models\data_cv;
use App\Models\dokumen;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a Pengajuan record
        $pengajuan = pengajuan_data::create([
            'id_customer' => 1234554324,
            'nama' => 'xeldom',
            'alamat' => 'trenggalek',
            'email' => 'yogi.com',
            'telepon' => '082228240098',
            'kategori_perusahaan' => 'pt',
            'jenis_pengajuan' => 'pendirian pt',
            'status' => 'onprogress'
        ]);

        // Create and associate multiple Pemohon records with the Pengajuan
        $pemohon =new pemohon([
            'id_pengajuan' => $pengajuan->id,
            'nama1' => 'xel',
            'tmp_lahir1' => 'trenggalek',
            'Tgl_lahir1'=> '2001-01-01',
            'alamat1' =>'Kampak, Trenggale',
            'pekerjaan1' => 'Backend Dev',
            'no_ktp1' => 6543456,
            'nama2' => 'xeldom',
            'tmp_lahir2' => 'ttl',
            'Tgl_lahir2'=> '2001-01-01',
            'alamat2' =>'ttl',
            'pekerjaan2'=> 'ttl',
            'no_ktp2'=> 1234567,
            'nama3'=> 'xxeldom1',
            'tmp_lahir3' => 'tyt',
            'Tgl_lahir3' =>'2001-02-01',
            'pekerjaan3' => 'as',
            'alamat3' =>'asd',
            'no_ktp3' => 567890,
        ]);

        $pemohon->save();

        $pemberi_kuasa = new pemberi_kuasa([
            'id_pengajuan' => $pengajuan->id,
            'pemilik_kuasa' => 'xeldom2',
            'tempat_lahir' => 'trenggalek',
            'tgl_lahir' => '2001-04-04',
            'alamat' => 'Bandung',
            'no_ktp' => 234567754
        ]);

        $pemberi_kuasa->save();

        $data_cv = new data_cv([
            'id_pengajuan' => $pengajuan->id,
            'nama_cv' => 'gds',
            'alamat_cv' => '',
            'bidang_usaha' => 'jasa',
            'modal' => '50000000',
            'persero_aktif' => 'zulfian',
            'persero_pasif' => 'zaki'

        ]);

        $data_cv->save();

        $dokumen = new dokumen([
            'id_pengajuan' => $pengajuan->id,
            'ktp' => "ktp.docx",
            'npwp'=> "npwp.docx",
            'kk' => "kk.docx",
        ]);

        $dokumen->save();
    }
}
