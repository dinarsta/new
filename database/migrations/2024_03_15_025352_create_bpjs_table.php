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
        Schema::create('bpjs', function (Blueprint $table) {
            $table->id();
            $table->string('no_bpjs');
            $table->string('norm');
            $table->string('nik_ktp')->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->text('sep');
            $table->text('tlp');
            $table->text('peserta');
            $table->text('diagnosa');
            $table->text('kelas');
            $table->unsignedBigInteger('selected_poli_id')->nullable();
            $table->unsignedBigInteger('selected_dokter_id')->nullable();
            $table->timestamps();

            $table->foreign('selected_poli_id')->references('id')->on('polies')->onDelete('set null');
            $table->foreign('selected_dokter_id')->references('id')->on('dokters')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bpjs');
    }
};
