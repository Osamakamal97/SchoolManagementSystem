<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{

	public function up()
	{
		Schema::create('classrooms', function (Blueprint $table) {
			$table->id()->unsigned();
			$table->string('name')->unique();
			$table->boolean('status')->default(true);
			$table->foreignId('grade_id')
				->constrained();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('classrooms');
	}
}
