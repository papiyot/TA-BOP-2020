<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetDasarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_dasar', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->string('kd_detail_dasar',8)->unique()->primary();
            $table->string('beban_id', 8);
            $table->foreign('beban_id')->references('kd_dasar')->on('dasar')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('detaildep_id',8);
            $table->foreign('detaildep_id')->references('kd_detail_dep')->on('detail_depar')
                ->onDelete('cascade');
             $table->string('pt_id', 8);
            $table->foreign('pt_id')->references('kd_pt')->on('pt')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jkl');
            $table->integer('lh');
            $table->integer('jm');


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
        Schema::dropIfExists('det_dasar');
    }
}