<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemberi_kuasa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'pemilik_kuasa',
        'tempat_lahir_pemilik_kuasa',
        'tgl_lahir_pemilik_kuasa',
        'alamat_pemilik_kuasa',
        'no_ktp_pemilik_kuasa'
    ];

    protected $dateFormat = 'Y-m-d'; // Specify the desired date format

    public function pengajuan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }

}
