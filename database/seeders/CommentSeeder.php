<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            for ($i = 0; $i < 3; $i++) {
                DB::table('comments')->insert([
                    'user_id' => 1,
                    'blog_id' => $blog->id,
                    'comment' => 'This is a review for product ' . $blog->name . '  ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}