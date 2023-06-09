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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('IdUser');
            $table->string('Email')->unique();
            $table->char('IdKota', 4);
            // $table->foreign('IdKota')->references('id')->on('regencies')->onDelete('no action')->onUpdate('no action');
            $table->string('password');
            $table->string('Nama');
            $table->text('Alamat');
            $table->string('Nohp',15);
            $table->string('FotoProfil')->nullable();
            $table->decimal('Saldo', 10, 2)->default(0.00);
            $table->enum('Role', ['umkm', 'konsumen']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
