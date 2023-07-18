<?php

namespace Database\Seeders;

use App\Models\enotaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class enotarisseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        enotaris::create([
           'nama' => 'jony',
           'alamat' => 'Trenggalek',
            'email' => 'jony@gmail.com',
            'telepon' => '082228240098'
        ]);
    }
}
