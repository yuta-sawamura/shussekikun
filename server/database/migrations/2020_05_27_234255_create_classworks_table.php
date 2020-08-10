<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id')->comment('店舗ID');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->string('name', 50)->comment('クラス名');
            $table->unique(
                ['store_id', 'name'],
                'unique_store_id_name'
            );
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
        Schema::dropIfExists('classworks');
    }
}
