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
        Schema::create('rutin_asets', function (Blueprint $table) {
            $table->uuid('id');
            $table -> primary('id');
            $table -> uuid('aset_id');
            $table -> foreign('aset_id') -> references('id') -> on('asets')->restrictOnDelete()->restrictOnUpdate();
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
        Schema::dropIfExists('rutin_asets');
    }
};