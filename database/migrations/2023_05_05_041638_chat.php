<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->bigIncrements('IdChat');
            $table->unsignedInteger('IdSender');
            $table->unsignedInteger('IdReceiver');
            $table->string('text', 500);
            $table->dateTime('time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('readStatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
};
