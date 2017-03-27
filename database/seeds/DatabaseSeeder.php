<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'ivank23',
            'email' => 'ivank23@example.com',
            'password' => bcrypt('password'),
            'dob' => '1994-12-23',
            'avatar' => 'img/ivank23.jpg',
            'validation' => str_random(10),
            'validated' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'YOUR MAIN CATEGORY',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'YOUR SECOND CATEGORY',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your first forum',
            'slug' => 'your-first-forum',
            'description' => 'Your description of the first forum',
            'category' => 'YOUR MAIN CATEGORY',
            'post_id' => '1',
            'glyphicon' => 'file',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your second forum',
            'slug' => 'your-second-forum',
            'description' => 'Your description of the second forum',
            'category' => 'YOUR MAIN CATEGORY',
            'glyphicon' => 'heart',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your super secret forum',
            'slug' => 'your-secret-forum',
            'description' => 'A description of a top secret forum',
            'category' => 'YOUR MAIN CATEGORY',
            'glyphicon' => 'lock',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your first alternative forum',
            'slug' => 'your-first-alternative-forum',
            'description' => 'Your description of the first alternative forum',
            'category' => 'YOUR SECOND CATEGORY',
            'glyphicon' => 'th',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your second alternative forum',
            'slug' => 'your-second-alternative-forum',
            'description' => 'Your description of the second alternative forum',
            'category' => 'YOUR SECOND CATEGORY',
            'glyphicon' => 'home',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('forums')->insert([
            'name' => 'Your third alternative forum',
            'slug' => 'your-third-alternative-forum',
            'description' => 'A description of a third alternative forum',
            'category' => 'YOUR SECOND CATEGORY',
            'glyphicon' => 'camera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('topics')->insert([
            'name' => 'Your first topic',
            'username' => 'ivank23',
            'category' => 'YOUR MAIN CATEGORY',
            'forum' => 'Your first forum',
            'post_id' => '1',
            'icon' => 'film',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('posts')->insert([
            'title' => 'Your first topic',
            'text' => 'This is the very first opening post, everybody!',
            'forum' => 'Your first forum',
            'topic' => '1',
            'username' => 'ivank23',
            'first' => '1',
            'icon' => 'film',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
