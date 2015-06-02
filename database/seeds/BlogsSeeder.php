<?php
 
use Illuminate\Database\Seeder;
 
class BlogsSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('blogs')->delete();
 
        $courses = array(
            ['id' => 1, 'slug' => 'my-first-blog', 'title' => 'How i met Amy Anderssen...', 'author' => 2, 'body' => 'Fake tits arent quite nice but this biatch is packing some real heat. She got 42GGs on her and thats the most stunning sight ive ever seen yoh! Naturally men hate those women who get these kind of implantations but did you see how Manuel Ferrera was doing it with her the last week? It was extreme...', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'slug' => 'my-second-blog', 'title' => 'Bed Coffee that gives you a jumpstart.', 'author' => 1, 'body' => 'Bed coffee can really give you a jump start says studies, students at Retardward University has found out that drinking coffee without waking up from bed or brushing your teeth gives the coffee a good taste, and your day will also be filled with energy. So go on now and develop the habit of drinking good bed coffee without brushing your teeth.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'slug' => 'my-third-blog', 'title' => 'It happened the third time.', 'author' => 3, 'body' => 'A really small misconception lead to this immense failure that was extremely devastating to our people at home and to ourselves. We shouldnt give them this much hope. he said when he thought about the consequences that could arise due to the miscalculations for the third year or not calculating at all. This is the case of Schizophrenic maniac since he cant stop doing this. This is actually really absurd because he should stop doing this since hes fooling the people around him and moreover making a fool of himself in front of everyone.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'slug' => 'my-awesome-blog', 'title' => 'This is an awesome feeling', 'author' => 4, 'body' => 'This is just about a thing that happened to me today. We were sitting in the sidelines watching the waves and i was talking to my good friend Sean Ambrose and everything he spoke of was beyond what an average people think and to be honest i dont think there is anybody else here in this village who thinks this way. I noticed how those guys who claimed to be good people was wasting their time around with their folks. Its okay to hang around but theyre no realising how much time theyre wasting but just spending their valueable time. And Sean is a good example of what and smart evolved adaptive human can be like.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'slug' => 'my-magnetic-blog', 'title' => 'The life magnets', 'author' => 1, 'body' => 'Girls are time killers and money drainers. Theyre the perfect tool you can use to decrease a mans productivity. A naive man could easily fall for the trap and he could think that hes in love with someone who cares about him so much theyre perfect actors designed by god himself. Theyve got good body proportions and very good curves that give you a boner on the first site. They can also be used as a tool for destroying a mans future by draining his soul.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'slug' => 'my-exotic-blog', 'title' => 'Exotic dishes in paris', 'author' => 1, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'slug' => 'my-absurd-blog', 'title' => 'An Awkward situation this is...', 'author' => 3, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			
            ['id' => 8, 'slug' => 'my-exhaustive-blog', 'title' => '12oClock after an exhasting day', 'author' => 2, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'slug' => 'my-frustrating-blog', 'title' => 'Girlfriends can be frustration busters.', 'author' => 1, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'slug' => 'my-lustful-erotic-blog', 'title' => 'A one night stand with the sexiest biatch in town.', 'author' => 1, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'slug' => 'my-ecstacic-blog', 'title' => 'How luxury brought me to his knees.', 'author' => 2, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'slug' => 'the-retarted-blog', 'title' => 'Gangbanging is a retarded act of SHITHOOD!', 'author' => 4, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'slug' => 'the-new-generation-blog', 'title' => 'The new generation cougars.', 'author' => 4, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'slug' => 'secret-blog', 'title' => '3 Hours with Bing and Michaels', 'author' => 3, 'body' => 'A course aimed for developing high networking assetment capabilities and troubleshooting.', 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );
 
        // Uncomment the below to run the seeder
        DB::table('blogs')->insert($courses);
    }
 
}