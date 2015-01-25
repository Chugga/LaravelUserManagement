<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('checklist_id')->unsigned();
            $table->integer('cl_section_template_id')->unsigned();

            $table->foreign('checklist_id')->references('id')->on('checklists');
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
		Schema::drop('cl_sections');
	}

}
