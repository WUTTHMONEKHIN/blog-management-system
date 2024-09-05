<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $blogs = Blog::with('likes')->inRandomOrder()->take(3)->get();

        $like_counts = [];

        foreach ($blogs as $blog) {
            $like_counts[$blog->id] = $blog->likes()->count();
        }

        return view('FE.home', compact('blogs', 'like_counts'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(3);
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();

        $like_counts = [];

        foreach ($blogs as $blog) {
            $like_counts[$blog->id] = $blog->likes()->count();
        }
        return view('FE.blogs', compact('categories', 'tags', 'blogs', 'like_counts'));
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', request()->slug)->with('category', 'tag', 'likes')->firstOrFail();
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();
        $comments = Comment::where('blog_id', $blog->id)->latest()->get();
        $like_count = $blog->likes()->count();
        return view('FE.blog', compact('categories', 'tags', 'blog', 'comments', 'like_count'));
    }
    public function blogsByTag($slug)
    {
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();
        $tagId = Tag::where('slug', $slug)->first();
        $blogs = Blog::where('tag_id', $tagId->id)->paginate('3');
        return view('FE.blogs-tag', compact('categories', 'tags', 'blogs'));
    }
    public function blogsByCategory($slug)
    {
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();
        $categoryId = Category::where('slug', $slug)->first();
        $blogs = Blog::where('category_id', $categoryId->id)->paginate('3');
        return view('FE.blogs-category', compact('categories', 'tags', 'blogs'));
    }
    public function like($slug)
    {
        // Find the blog by slug
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Check if the user has already liked the blog
        $like = Like::where('user_id', auth()->id())->where('blog_id', $blog->id)->first();

        if ($like) {
            // If the user already liked the blog, remove the like
            $like->delete();
            $liked = false; // Set liked to false
        } else {
            // Otherwise, add a like
            Like::create([
                'user_id' => auth()->id(),
                'blog_id' => $blog->id,
            ]);
            $liked = true; // Set liked to true
        }

        // Return the updated like count and whether it is liked
        return response()->json([
            'liked' => $liked,
            'like_count' => $blog->likes()->count()
        ]);
    }
}
