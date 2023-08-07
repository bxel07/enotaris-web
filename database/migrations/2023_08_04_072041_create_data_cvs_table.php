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
        Schema::create('data_cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengajuan');
            $table->string('nama_cv');
            $table->string('alamat_cv');
            $table->string('bidang_usaha');
            $table->string('modal');
            $table->string('persero_aktif');
            $table->string('persero_pasif');
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id')->on('pengajuan_datas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_cvs');
    }
};
