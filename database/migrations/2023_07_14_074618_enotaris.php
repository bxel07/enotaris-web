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
        Schema::create('enotaris', function (Blueprint $table) {
                        $table->id();
                        $table->string("nama");
                        $table->string("alamat");
                        $table->string("email");
                        $table->bigInteger("telepon");
                        $table->string("status");
                        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //$table->id();
        //            $table->string("nama");
        //            $table->string("alamat");
        //            $table->string("email");
        //            $table->bigInteger("telepon");
        //            $table->string("status");
        //            $table->timestamps();
    }
};
