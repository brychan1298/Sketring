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
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->bigIncrements('IdTransaksi');

            $table->unsignedBigInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('IdAcara');
            $table->foreign('IdAcara')->references('IdAcara')->on('Acara')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->date('TanggalTransaksi');
            $table->date('TanggalPesanan');
            $table->boolean('SudahBayar');
            $table->string('AlamatKirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Transaksi');
    }
};
