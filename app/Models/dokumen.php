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
        'sertifikattanah'
    ];

    public function with_enotaris_relation() {
        $this->belongsTo(enotaris::class);
    }
}
