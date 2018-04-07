<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('staff_id')->unsigned();
			$table->integer('hours_requested')->unsigned();
			$table->boolean('prebooked')->nullable();
			$table->dateTime('request_date_from');
			$table->dateTime('request_date_to');
			$table->float('saturday')->unsigned()->nullable();
			$table->integer('approved')->unsigned()->nullable();
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
        Schema::drop('holidays');
    }
}
