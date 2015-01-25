<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cl_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cl_subsection_id')->unsigned();
            $table->integer('cl_question_template_id')->unsigned();
            $table->boolean('pass')->default(true);
            $table->string('answer', 2000)->nullable();

            $table->foreign('cl_subsection_id')->references('id')->on('cl_subsections');
            $table->foreign('cl_question_template_id')->references('id')->on('cl_question_templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cl_questions');
	}

}
