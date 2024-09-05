<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Subscribe;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('category', 'tag', 'likes')->withCount('likes')->latest()->get();
        return view('BK.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('BK.blogs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'title' => 'required|unique:blogs',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
        if ($validation) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/blogs'), $imageName);
                $validation['image'] = $imageName;
            }
            $blog = Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'image' => $validation['image'],
                'category_id' => $request->category_id,
                'tag_id' => $request->tag_id,
                'admin_id' => auth()->guard('admin')->user()->id,
            ]);
            $subscribers = Subscribe::all(); // Fetch all subscribers
            $this->sendReservationNotifications($subscribers, $blog->title); // Send notifications
            return redirect()->route('admin.blogs.index')->with('success', 'Blog Added Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::with('category')->find($blog->id);
        return view('BK.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blog = Blog::with('category')->find($blog->id);
        return view('BK.blogs.edit', compact('blog', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validation = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
        if ($validation) {
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($blog->image && file_exists(public_path('/images/blogs') . '/' . $blog->image)) {
                    unlink(public_path('/images/blogs') . '/' . $blog->image);
                }

                $file = $request->file('image');
                $file_name = uniqid() . $file->getClientOriginalName();
                $file->move(public_path('/images/blogs'), $file_name);

                $blog->image = $file_name;
            }

            $blog->update(
                [
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'tag_id' => $request->tag_id,
                    'admin_id' => auth()->guard('admin')->user()->id,
                    'image' => $blog->image,
                ]
            );

            return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
        } else {
            return redirect()->back()->with('error', 'Blog update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path('/images/blogs') . '/' . $blog->image)) {
            unlink(public_path('/images/blogs') . '/' . $blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
    private function sendReservationNotifications($subscribers, $blogTitle)
    {
        foreach ($subscribers as $subscriber) {
            Mail::html(
                '<p>Dear Subscriber,</p>
                <p>We are excited to inform you that a new blog post titled <strong>' . $blogTitle . '</strong> has been published on our website. We believe this new post will be of great interest to you.</p>
                <p>Thank you for your continued support. Stay tuned for more updates and exciting content!</p>
                <p>Best regards,<br>The Oleez Blog Team</p>',
                function ($m) use ($subscriber) {
                    $m->to($subscriber->email); // Send to each subscriber's email
                    $m->subject('New Blog Post Available from Oleez Blog Management System');
                }
            );
        }
    }
}
