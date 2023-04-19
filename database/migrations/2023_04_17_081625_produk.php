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
        Schema::create('Produk', function (Blueprint $table) {
            $table->bigIncrements('IdProduk');
            $table->unsignedBigInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('users')->onDelete('cascade');
            $table->string('Nama');
            $table->string('FotoProduk')->nullable();
            $table->text('Deskripsi');
            $table->decimal('Harga', 10, 2);
            $table->float('Rating', 2, 1)->default(0);
            $table->integer('MinOrder');
            $table->integer('MaxOrder');
            $table->integer('JumlahRating')->default(0);
            $table->integer('MinimalWaktuPO')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Produk');
    }
};
