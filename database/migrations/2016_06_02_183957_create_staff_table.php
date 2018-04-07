<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
			$table->string('second_name');
			$table->string('address1');
			$table->string('address2');
			$table->string('address3');
			$table->string('postcode');
			$table->string('email');
			$table->string('mobile');
			$table->integer('salon_id')->unsigned();
			$table->date('dob');
			$table->integer('working_hours_week')->unsigned();
			$table->integer('holiday_entitlement')->unsigned();
			$table->integer('free_time_entitlement')->unsigned();
			$table->boolean('active');
			$table->integer('role')->unsigned();
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
        Schema::drop('staffs');
    }
}
