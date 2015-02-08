<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectionNumberToClSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cl_sections', function(Blueprint $table)
		{
			$table->integer('section_number');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cl_sections', function(Blueprint $table)
		{
            $table->dropColumn('section_number');
		});
	}

}
