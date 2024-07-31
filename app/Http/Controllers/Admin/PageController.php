<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $categories = Category::count();
        $tags = Tag::count();
        $blogs = Blog::count();
        $users =  User::count();
        $admins = Admin::count();
        $subscribes = Subscribe::count();
        return view('BK.dashboard', compact('categories', 'tags', 'blogs', 'users', 'admins', 'subscribes'));
    }
}