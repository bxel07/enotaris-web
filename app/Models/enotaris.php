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

    public function with_dokumens_relation() {
        $this->hasMany(                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             dokumen::class);
    }
}
