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
       Schema::create('motors', function (Blueprint $table) {
            $table->id(); 
            $table->string('id_motor')->unique();
            $table->string('merek');
            $table->string('tipe');
            $table->integer('tahun');
            $table->integer('kilometer');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('status'); 
            $table->timestamps();
            
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
