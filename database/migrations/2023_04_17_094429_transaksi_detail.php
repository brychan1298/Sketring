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
        Schema::create('TransaksiDetail', function (Blueprint $table) {
            $table->bigIncrements('Id');

            $table->unsignedBigInteger('IdTransaksi');
            $table->foreign('IdTransaksi')->references('IdTransaksi')->on('Transaksi')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('IdProduk');
            $table->foreign('IdProduk')->references('IdProduk')->on('Produk')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('IdAcara');
            $table->foreign('IdAcara')->references('IdAcara')->on('Acara')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->integer('Qty');
            $table->integer('Status');
            $table->integer('StatusRated')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TransaksiDetail');
    }
};
