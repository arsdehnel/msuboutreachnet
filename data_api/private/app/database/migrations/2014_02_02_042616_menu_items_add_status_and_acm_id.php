<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuItemsAddStatusAndAcmId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menu_items', function(Blueprint $table)
		{
	        $table->string('status_code')->default('A');
	        $table->integer('access_ctrl_mstr_id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menu_items', function(Blueprint $table)
		{
			//
		});
	}

}