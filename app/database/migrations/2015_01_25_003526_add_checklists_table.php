<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChecklistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('checklist_template_id')->unsigned();
            $table->string('address');
            $table->timestamp('conducted_at');
            $table->string('job_number');
            $table->string('weather', 1000);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
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
		Schema::drop('checklists');
	}

}
