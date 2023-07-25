<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'ktp',
        'npwp',
        'sertifikattanah',
        'enotaris_id'
    ];

    public function enotaris() {
        $this->belongsTo(enotaris::class);
    }
}
