<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemohon extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'nama1',
        'tmp_lahir1',
        'Tgl_lahir1',
        'alamat1',
        'pekerjaan1',
        'no_ktp1',
        'nama2',
        'tmp_lahir2',
        'Tgl_lahir2',
        'alamat2',
        'pekerjaan2',
        'no_ktp2',
        'nama3',
        'tmp_lahir3',
        'Tgl_lahir3',
        'pekerjaan3',
        'alamat3',
        'no_ktp3',
    ];

    protected $dateFormat = 'Y-m-d'; // Specify the desired date format


    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(pengajuan::class,'id_pengajuan');
    }
}
