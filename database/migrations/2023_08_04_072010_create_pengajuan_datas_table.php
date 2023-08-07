<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_datas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_customer');
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('kategori_perusahaan');
            $table->string('jenis_pengajuan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_datas');
    }
};
