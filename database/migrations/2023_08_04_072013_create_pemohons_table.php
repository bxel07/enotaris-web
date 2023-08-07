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
        Schema::create('pemohons', function (Blueprint $table) {
            $table->id();
            //foreignkey
            $table->unsignedBigInteger('id_pengajuan');
            //pemohon 1
            $table->string('nama1');
            $table->string('tmp_lahir1');
            $table->date('Tgl_lahir1');
            $table->string('alamat1');
            $table->string('pekerjaan1');
            $table->string('no_ktp1');

            //pemohon 2
            $table->string('nama2');
            $table->string('tmp_lahir2');
            $table->date('Tgl_lahir2');
            $table->string('alamat2');
            $table->string('pekerjaan2');
            $table->string('no_ktp2');

            //pemohon 3
            $table->string('nama3');
            $table->string('tmp_lahir3');
            $table->date('Tgl_lahir3');
            $table->string('pekerjaan3');
            $table->string('alamat3');
            $table->string('no_ktp3');
            $table->timestamps();
            $table->foreign('id_pengajuan')->references('id')->on('pengajuan_datas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
