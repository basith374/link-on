<?php
 
use Illuminate\Database\Seeder;
 
class CoursesSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('courses')->delete();
 
        $courses = array(
            ['id' => 1, 'slug' => 'network-ex', 'title' => 'Advanced Networking Expert', 'acronym' => 'ANE', 'description' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'slug' => 'organisation-ex', 'title' => 'Computer Organization Expert', 'acronym' => 'COE', 'description' => 'Best course designed for developing very good computer organization analysis and design skills.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'slug' => 'system-ex', 'title' => 'System Programming Expert', 'acronym' => 'SPE', 'description' => 'The course for expert programmers who specifically wants to develop programs that works with the OS.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
            ['id' => 4, 'slug' => 'architecture-ex', 'title' => 'System Architecture Expert', 'acronym' => 'SAE', 'description' => 'An advanced course on system architecture aimed for sharpening the system architecture skills.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'slug' => 'security-ex', 'title' => 'Advanced Security Expert', 'acronym' => 'ASE', 'description' => 'This is a course for the one who wants to be a system security specialist who dont crack under pressure.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'slug' => 'voice-ex', 'title' => 'Voice Processing Expert', 'acronym' => 'VPE', 'description' => 'Extreme voice analysis and decoding programms expert who has a keen skill in distinguishing voices that are vague and unclear.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
            ['id' => 7, 'slug' => 'social-ex', 'title' => 'Social Engineering Expert', 'acronym' => 'SEE', 'description' => 'A course that sharpens the skilled taking expert to help him master the art of deception.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'slug' => 'writer-ex', 'title' => 'Documentation Writing Expert', 'acronym' => 'DWE', 'description' => 'The student is taught everything he/she needs to write good quality documentation for their software.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'slug' => 'code-ex', 'title' => 'Code Analysis Expert', 'acronym' => 'CAE', 'description' => 'For the ones who wants to become and extreme expert in code analysis and debugging, learn the best techiques for debugging.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
            ['id' => 10, 'slug' => 'patterns-ex', 'title' => 'Design Patterns Expert', 'acronym' => 'DPE', 'description' => 'Learn the best design patterns taught by the experts who are key contributors to the development of new generation design patterns', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'slug' => 'forensics-ex', 'title' => 'Computer Forensics Expert', 'acronym' => 'CFE', 'description' => 'If you complete this course you\'re able to unviel the most devastating and most unsolvable cyber crimes, taught by experts who spent decades in jail for hacking', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'slug' => 'ethical-ex', 'title' => 'Ethical Hacking Expert', 'acronym' => 'EHE', 'description' => 'The best hacking techniques are learned from the innovative and extensive subjects that contribute to the latest tools under development by top expert hackers in the globe', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('courses')->insert($courses);
    }
 
}