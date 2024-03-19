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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_poli')->nullable();
            $table->string('nama_dokter');
            $table->string('jam_kerja');
            $table->string('hari');
            $table->string('shift');
            $table->timestamps();



            $table->foreign('id_poli')->references('id')->on('polies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
