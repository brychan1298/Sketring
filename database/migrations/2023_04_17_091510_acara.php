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
        Schema::create('Acara', function (Blueprint $table) {
            $table->bigIncrements('IdAcara');
            $table->unsignedBigInteger('IdUser');
            $table->foreign('IdUser')->references('IdUser')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('Nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Acara');
    }
};
