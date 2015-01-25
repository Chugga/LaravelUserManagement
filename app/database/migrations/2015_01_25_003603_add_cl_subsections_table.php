<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClSubsectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_subsections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cl_section_id')->unsigned();
            $table->integer('cl_subsection_template_id')->unsigned();

            $table->foreign('cl_section_id')->references('id')->on('cl_sections');
            $table->foreign('cl_subsection_template_id')->references('id')->on('cl_subsection_templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cl_subsections');
	}

}
