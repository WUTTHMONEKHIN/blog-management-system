<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $blogs = Blog::all()->random('3');
        return view('FE.home', compact('blogs'));
    }
    public function blogs()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blogs = Blog::latest()->paginate('3');
        return view('FE.blogs', compact('categories', 'tags', 'blogs'));
    }
    public function blog($slug)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blogId = Blog::where('slug', $slug)->first();
        $comments = Comment::where('blog_id', $blogId->id)->get();
        $blog = Blog::where('slug', request()->slug)->with('category', 'tag')->first();
        return view('FE.blog', compact('categories', 'tags', 'blog', 'comments'));
    }
}