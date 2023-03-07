<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function next()
    {
        // get next post
        return Post::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
    public  function previous()
    {
        // get previous  post
        return Post::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
}
