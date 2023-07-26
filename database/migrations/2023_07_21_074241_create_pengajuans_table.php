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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("id_customer");
            $table->string("nama");
            $table->string("alamat");
            $table->string("email");
            $table->bigInteger("telepon");
            $table->string("jenis_perusahaan");
            $table->string("jenis_pengajuan");
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('sertifikattanah')->nullable();
            $table->string("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
