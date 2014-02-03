<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table)
		{
	        $table->increments('menu_item_id');
	        $table->integer('parent_menu_item_id');
	        $table->string('menu_code');
	        $table->string('disp_text');
	        $table->string('link_href');
	        $table->string('item_class');
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
		Schema::table('menu_items', function(Blueprint $table)
		{
			//
		});
	}

}