<?php
 
use Illuminate\Database\Seeder;
 
class SubjectsSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('subjects')->delete();
 
        $courses = array(
            ['id' => 1, 'slug' => 'database-management-system', 'title' => 'Database Management System', 'acronym' => 'DBMS', 'description' => 'Complete database systems from one subject.', 'cost' => 5000, 'timeperiod' => 90, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'slug' => 'network-security', 'title' => 'Network Security', 'acronym' => 'NS', 'description' => 'Everything you want to learn about network security.', 'cost' => 8000, 'timeperiod' => 100, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'slug' => 'system-architecure', 'title' => 'System Architecture', 'acronym' => 'SA', 'description' => 'All of system architecture under one roof.', 'cost' => 7000, 'timeperiod' => 120, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'slug' => 'enumeration-pentesting', 'title' => 'Enumeration and Pentesting', 'acronym' => 'EP', 'description' => 'The perfect book for peneration testing.', 'cost' => 9500, 'timeperiod' => 120, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'slug' => 'routing-protocols', 'title' => 'Routing protocols and Network protocol stack', 'acronym' => 'RP', 'description' => 'Design your own protocol stack from the ground up.', 'cost' => 50000, 'timeperiod' => 360, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('subjects')->insert($courses);
    }
 
}