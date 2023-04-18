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
        Schema::create('Keranjang', function (Blueprint $table) {
            $table->bigIncrements('IdKeranjang');
            $table->unsignedBigInteger('IdAcara');
            $table->foreign('IdAcara')->references('IdAcara')->on('Acara')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('IdProduk');
            $table->foreign('IdProduk')->references('IdProduk')->on('Produk')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('Qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Keranjang');
    }
};
