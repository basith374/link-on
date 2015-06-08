<?php
 
use Illuminate\Database\Seeder;
 
class RolesSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('roles')->delete();
 
        $courses = array(
            ['id' => 1, 'slug' => 'admin', 'title' => 'Admin', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'slug' => 'writer', 'title' => 'Writer', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'slug' => 'designer', 'title' => 'Designer', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('roles')->insert($courses);
    }
 
}