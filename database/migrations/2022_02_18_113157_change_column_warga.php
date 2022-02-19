<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnWarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn('status_kehidupan');
            $table->bigInteger('mutasi_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn('mutasi_id');
        });
    }
}
