<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telepons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->unsignedBigInteger('pengguna_id');
            //relasi dengan tabel pengguna
            $table->foreign('pengguna_id')->references('id')->on('penggunas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telepons');
    }
};
