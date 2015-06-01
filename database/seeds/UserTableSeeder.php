<?php
 
use Illuminate\Database\Seeder;
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $courses = array(
            ['id' => 1, 'name' => 'Sean Ambrose', 'email' => 'seanfurious56@thatshowweroll.com', 'password' => '$2y$10$gkoOUnRTKKCpKWJvn7nBtOOmIiolaAQq8Z0C2iodhYc61DxMV/7ge', 'remember_token' => 'GaEIgQp4ciyAt0adcZK2D37sMfzCnXn9I0DhV8mLUtJKSh9SA8GdpzwuoYNe', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Jenna Presley', 'email' => 'jennapresley@fackme.com', 'password' => '$2y$10$gkoOUnRTKKCpKWJvn7nBtOOmIiolaAQq8Z0C2iodhYc61DxMV/7ge', 'remember_token' => 'GaEIgQp4ciyAt0adcZK2D37sMfzCnXn9I0DhV8mLUtJKSh9SA8GdpzwuoYNe', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Karl Extort', 'email' => 'karlxxx@newzh.com', 'password' => '$2y$10$gkoOUnRTKKCpKWJvn7nBtOOmIiolaAQq8Z0C2iodhYc61DxMV/7ge', 'remember_token' => 'GaEIgQp4ciyAt0adcZK2D37sMfzCnXn9I0DhV8mLUtJKSh9SA8GdpzwuoYNe', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Carmella Bing', 'email' => 'bing@ngsluts.com', 'password' => '$2y$10$gkoOUnRTKKCpKWJvn7nBtOOmIiolaAQq8Z0C2iodhYc61DxMV/7ge', 'remember_token' => 'GaEIgQp4ciyAt0adcZK2D37sMfzCnXn9I0DhV8mLUtJKSh9SA8GdpzwuoYNe', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($courses);
    }
 
}