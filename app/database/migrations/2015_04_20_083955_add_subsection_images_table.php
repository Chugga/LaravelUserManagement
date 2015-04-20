<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubsectionImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subsection_images', function(Blueprint $table)
		{
            $table->increments('id');
            $table->timestamps();
            $table->integer('cl_subsection_id')->unsigned();
            $table->string('filename');

            $table->foreign('cl_subsection_id')->references('id')->on('cl_subsections');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subsection_images');
	}

}
