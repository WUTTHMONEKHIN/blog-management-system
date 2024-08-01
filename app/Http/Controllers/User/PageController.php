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
        $blogs = Blog::latest()->paginate('3');
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();
        return view('FE.blogs', compact('categories', 'tags', 'blogs'));
    }
    public function blog($slug)
    {
        $blog = Blog::where('slug', request()->slug)->with('category', 'tag')->firstOrFail();
        $categories = Category::has('blogs')->get();
        $tags = Tag::has('blogs')->get();
        $comments = Comment::where('blog_id', $blog->id)->latest()->get();
        return view('FE.blog', compact('categories', 'tags', 'blog', 'comments'));
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
}