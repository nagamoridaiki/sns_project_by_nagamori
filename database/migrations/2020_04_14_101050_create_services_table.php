<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('provider_id')->unsigned();
            $table->string('title');
            $table->text('content_text');
            $table->string('content_image1')->nullable();
            $table->string('content_image2')->nullable();
            $table->string('content_image3')->nullable();
            $table->integer('price')->default(0);
            $table->string('term');//期間（単発or１ヶ月)
            $table->text('memo');
            $table->timestamps();
            //外部キーの設定
            $table->foreign('provider_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service');
    }
}
