<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'image', 'description', 'category_id', 'tag_id', 'admin_id'];
    protected $appends = ['image_url', 'like_count'];
    public function getImageUrlAttribute()
    {
        return asset('/images/blogs/' . $this->image);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getLikeCountAttribute()
    {
        return $this->likes()->count();
    }
}
