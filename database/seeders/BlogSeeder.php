<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = DB::table('categories')->pluck('id');
        $tags = DB::table('tags')->pluck('id');
        $imageNames = range(1, 10);
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->words(3, true);
            DB::table('blogs')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => $imageNames[$i] . '.jpg',
                'description' => $faker->paragraph,
                'category_id' => $faker->randomElement($categories),
                'tag_id' => $faker->randomElement($tags),
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
