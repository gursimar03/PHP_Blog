<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
    public function assignTags($tags)
    {
        // Sync the tags for the post
        $this->tags()->sync($tags);
    }
    
        public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
