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
        Schema::create('asets', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('jenis_aset');
            $table->string('merk');
            $table->string('tipe');
            $table->string('foto');
            $table->string('s_n');
            $table->string('owner');
            $table->integer('th_produksi');
            $table->integer('th_pengadaan');
            $table->integer('th_penggunaan');
            $table->string('lokasi');
            $table->string('koordinat');
            $table->string('status');
            $table->string('kondisi');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};