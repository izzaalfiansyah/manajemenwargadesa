<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk');
            $table->text('alamat_domisili')->nullable();
            $table->enum('status_rumah', ['1', '2'])->comment('1 = milik sendiri, 2 = kontrak');
            $table->bigInteger('kepala_keluarga_id')->unsigned();
            $table->json('anggota_id')->nullable();
            $table->string('file_kk');
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
        Schema::dropIfExists('keluarga');
    }
}
