<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('cl_question_id')->unsigned();
            $table->string('filename');

            $table->foreign('cl_question_id')->references('id')->on('cl_questions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question_images');
	}

}
