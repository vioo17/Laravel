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
            $table->unsignedBigInteger('id_motor');
            $table->string('alamat');
            $table->integer('jumlah');
            $table->date('tanggal_terima');
            $table->timestamps();

            // Foreign key constraint (opsional, jika ingin relasi ke tabel motor)
            $table->foreign('id_motor')->references('id_motor')->on('motors')->onDelete('cascade');
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
