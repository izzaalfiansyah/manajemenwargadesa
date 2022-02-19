<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('ketua_rw');
            $table->string('ketua_rt');
            $table->string('sekretaris');
            $table->string('bendahara');
            $table->json('seksi_seksi');
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
        Schema::dropIfExists('pengurus');
    }
}
