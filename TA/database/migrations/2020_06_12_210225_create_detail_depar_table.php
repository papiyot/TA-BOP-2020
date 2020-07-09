<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDeparTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_depar', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->string('kd_detail_dep',8)->unique()->primary();
            $table->string('kode', 8);
            $table->foreign('kode')->references('kd_dp')->on('departemen')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_detail_dep');
            $table->integer('kos_awal');
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
        Schema::dropIfExists('detail_depar');
    }
}