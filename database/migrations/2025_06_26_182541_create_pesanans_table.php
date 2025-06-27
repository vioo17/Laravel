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
        Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('alamat');
        $table->string('telepon');
        $table->date('tanggal_terima');
        $table->string('tipe');
        $table->string('merk_motor');
        $table->integer('jumlah');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
