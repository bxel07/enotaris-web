<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_cv extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'nama_cv',
        'alamat_cv',
        'bidang_usaha',
        'modal',
        'persero_aktif',
        'persero_pasif'
    ];

    public function pengajuan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
}
