<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('send_user_id')->unsigned();
            $table->bigInteger('receive_user_id')->unsigned();
            $table->text('message_text');
            $table->boolean('is_readed')->default("0");
            $table->timestamps();
            //外部キーの設定
            $table->foreign('send_user_id')->references('id')->on('users');
            $table->foreign('receive_user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
