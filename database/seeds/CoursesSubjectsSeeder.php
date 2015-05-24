<?php
 
use Illuminate\Database\Seeder;
 
class CourseSubjectSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('course_subject')->delete();
 
        $courses = array(
            ['id' => 1, 'course_id' => 1, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'course_id' => 1, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'course_id' => 1, 'subject_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'course_id' => 2, 'subject_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'course_id' => 3, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'course_id' => 3, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'course_id' => 3, 'subject_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'course_id' => 4, 'subject_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'course_id' => 4, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'course_id' => 5, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'course_id' => 5, 'subject_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'course_id' => 5, 'subject_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'course_id' => 6, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'course_id' => 7, 'subject_id' => 5, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'course_id' => 8, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 16, 'course_id' => 9, 'subject_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 17, 'course_id' => 10, 'subject_id' => 4, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'course_id' => 11, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'course_id' => 12, 'subject_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 20, 'course_id' => 12, 'subject_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 21, 'course_id' => 12, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 22, 'course_id' => 12, 'subject_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('course_subject')->insert($courses);
    }
 
}