<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('CoursesSeeder');
		$this->call('SubjectsSeeder');
		$this->call('CourseSubjectSeeder');
		$this->call('BlogsSeeder');
		$this->call('RolesSeeder');
		$this->call('UserRolesSeeder');
	}

}
