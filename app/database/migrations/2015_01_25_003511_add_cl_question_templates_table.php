<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClQuestionTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_question_templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cl_subsection_template_id')->unsigned();
            $table->softDeletes();
            $table->string('question');

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
		Schema::drop('cl_question_templates');
	}

}
