<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
        'image',
    ];
    // can you  usre it $guarded if you had a property you dont want to add by your own

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}

}
