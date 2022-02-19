<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username', 30);
            $table->string('password', 255);
            $table->string('nama', 50);
            $table->string('alamat');
            $table->string('telepon');
            $table->enum('role', ['1', '2'])->comment('1 = admin, 2 = regular');
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
        Schema::dropIfExists('user');
    }
}
