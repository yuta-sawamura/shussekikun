<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id')->comment('店舗ID');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('classwork_id')->comment('クラスID');
            $table->foreign('classwork_id')->references('id')->on('classworks')->onDelete('cascade');
            $table->unsignedSmallInteger('day')->comment('曜日(1:日 2:月 3:火 4:水 5:木 6:金 7:土)');
            $table->time('start_at')->comment('開始時間');
            $table->time('end_at')->comment('終了時間');
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
        Schema::dropIfExists('schedules');
    }
}
