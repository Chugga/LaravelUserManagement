<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubsectionNumberToClSubsectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cl_subsections', function(Blueprint $table)
		{
            $table->integer('subsection_number');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cl_subsections', function(Blueprint $table)
		{
            $table->dropColumn('subsection_number');
		});
	}

}
