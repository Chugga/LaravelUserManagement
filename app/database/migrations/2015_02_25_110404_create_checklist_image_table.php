<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklist_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('checklist_id')->unsigned();
            $table->string('filename');

            $table->foreign('checklist_id')->references('id')->on('checklist');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('checklist_images');
	}

}
