<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        \App\Models\Post::factory(3000)->create();



        User::create([
            'name' => 'Iyunk',
            'email' => 'iyunk@gmail.com',
            'Password' => bcrypt('12345')

        ]);

        // post::create([
        //     'title' => 'JUDUL PERTAMA',
        //     'slug' => 'JUDUL PERTAMA',
        //      'category_id' => '3',
        //      'user_id' => '1',
        //     'excerpt' => 'The sports-loving field captain of the task force of the Countermeasure Committee at Abydos High.',
        //     'body' => '<p>The sports-loving field captain of the task force of the Countermeasure Committee at Abydos High. Generally a girl of few words and emotions alike, she gives off an aloof aura but cares more of Abydos High above all else.</p><p>In order to revitalize the school, she is willing to do any means and methods to help the school recover, and occasionally proposes ridiculous ideas. (In her case, bank robbery)</p>'
        // ]);

        category::create([
            'name' => 'WEB Programming',
            'slug' => 'WEB Programming',
        ]);
        category::create([
            'name' => 'Personal',
            'slug' => 'Personal',
        ]);
    }
}
