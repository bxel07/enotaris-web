<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
      'id_pengajuan',
      'ktp',
      'npwp',
      'kk'
    ];

    public function pengajuan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(pengajuan::class, 'id_pengajuan');
    }
}
