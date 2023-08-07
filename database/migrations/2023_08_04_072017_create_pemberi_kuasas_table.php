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
        Schema::create('pemberi_kuasas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengajuan');
            $table->string('pemilik_kuasa');
            $table->string('tempat_lahir_pemilik_kuasa');
            $table->string('tgl_lahir_pemilik_kuasa');
            $table->string('alamat_pemilik_kuasa');
            $table->bigInteger('no_ktp_pemilik_kuasa');
            $table->timestamps();
            $table->foreign('id_pengajuan')->references('id')->on('pengajuan_datas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemberi_kuasas');
    }
};
