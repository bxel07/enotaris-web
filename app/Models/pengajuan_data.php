<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_data extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'nama',
        'alamat',
        'email',
        'telepon',
        'alamat',
        'kategori_perusahaan',
        'jenis_pengajuan',
        'status'
    ];


    public function pemohon(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(pemohon::class,'id_pengajuan');
    }

    public function pemberi_kuasa()
    {
        return $this->hasMany(pemberi_kuasa::class,'id_pengajuan');
    }

    public function data_cv()
    {
        return $this->hasMany(data_cv::class,'id_pengajuan');
    }

    public function dokumen(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(dokumen::class, 'id_pengajuan');
    }
}
