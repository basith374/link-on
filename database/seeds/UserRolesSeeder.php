<?php
 
use Illuminate\Database\Seeder;
 
class UserRolesSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('user_role')->delete();
 
        $courses = array(
            ['id' => 1, 'user_id' => 1, 'role_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'user_id' => 2, 'role_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'user_id' => 3, 'role_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'user_id' => 3, 'role_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'user_id' => 4, 'role_id' => 3, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'user_id' => 4, 'role_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('user_role')->insert($courses);
    }
 
}