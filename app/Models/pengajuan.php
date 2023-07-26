<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_customer",
        "nama",
        "alamat",
        "email",
        "telepon",
        "jenis_perusahaan",
        "jenis_pengajuan",
        'ktp',
        'npwp',
        'sertifikattanah',
        "status"
    ];
}
