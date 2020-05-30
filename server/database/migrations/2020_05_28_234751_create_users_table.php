<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('organization_id')->comment('組織ID');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->unsignedBigInteger('store_id')->nullable()->comment('店舗ID');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable()->comment('店舗ID');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('sei', 50)->comment('姓');
            $table->string('mei', 50)->comment('名');
            $table->string('sei_kana', 100)->comment('セイ');
            $table->string('mei_kana', 100)->comment('メイ');
            $table->string('img')->nullable()->comment('画像のS3パス');
            $table->unsignedSmallInteger('gender')->nullable()->comment('性別(1:男 2:女)');
            $table->date('birth')->nullable()->comment('誕生日');
            $table->unsignedTinyInteger('role')->comment('権限(1:システム管理者  3:管理者 5:共有アカウント)');
            $table->string('password', 255)->nullable()->comment('パスワード');
            $table->unsignedSmallInteger('status')->comment('状態(1:会員 2:退会)');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
