<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prize_name')->comment('獎品名稱');
            $table->string('win_name')->comment('中獎人姓名');
            $table->string('win_email')->comment('中獎人Email');
            $table->date('win_date')->comment('中獎日期');

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
        Schema::dropIfExists('prize_lists');
    }
}
