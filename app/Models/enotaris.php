<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enotaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'telepon',
        'status'
    ];

    public function dokumen() {
        $this->hasMany(dokumen::class);
    }
}
