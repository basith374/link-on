<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoursesSubjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->default('');
			$table->string('title');
			$table->string('acronym');
			$table->text('description');
			$table->softDeletes();
			$table->timestamps();
		});
		
		Schema::create('subjects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->default('');
			$table->string('title');
			$table->string('acronym');
			$table->text('description');
			$table->integer('cost');
			$table->integer('timeperiod');
			$table->softDeletes();
			$table->timestamps();
		});
		
		Schema::create('course_subject', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->integer('subject_id')->unsigned();
			$table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_subject');
		Schema::drop('courses');
		Schema::drop('subjects');
	}

}
