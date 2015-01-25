<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClSectionTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_section_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('checklist_template_id')->unsigned();
            $table->string('name');
            $table->string('subsection_titles');

            $table->foreign('checklist_template_id')->references('id')->on('checklist_templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cl_section_templates');
	}

}
