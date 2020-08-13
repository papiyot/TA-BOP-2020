<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HitungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hitung', function (Blueprint $table) {
            $table->string('hitung_id')->primary();
            $table->string('hitung_value');
            $table->string('pembebanan_id');
            $table->string('departemen_id');
            $table->foreign('pembebanan_id')->references('pembebanan_id')->on('pembebanan')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('departemen_id')->references('departemen_id')->on('departemen')
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
        Schema::dropIfExists('hitung');
    }
}
