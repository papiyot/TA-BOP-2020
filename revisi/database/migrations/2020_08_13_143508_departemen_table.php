<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->string('departemen_id')->primary();
            $table->string('departemen_nama');
            $table->string('departemen_type');
            $table->integer('departemen_kosawal');
            $table->string('pt_id');
            $table->string('beban');
            $table->foreign('pt_id')->references('pt_id')->on('pt')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('beban')->references('pembebanan_id')->on('pembebanan')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}
