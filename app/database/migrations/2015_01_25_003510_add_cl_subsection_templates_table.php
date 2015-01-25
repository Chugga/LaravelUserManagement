<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClSubsectionTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_subsection_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cl_section_template_id')->unsigned();
            $table->string('name');

            $table->foreign('cl_section_template_id')->references('id')->on('cl_section_templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cl_subsection_templates');
	}

}
