<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('da_power_groups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('group')->nullable;
			$table->foreign('group')->references('id')->on('power_groups');
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
		Schema::drop('da_power_groups');
	}

}
