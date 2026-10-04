<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = []; //means it doesn't guard against any mass-assignment !! only for data which we developers are in control of

    //protected $with = ['category', 'author']; // allows to not need to specify with or load in the routes file

    public function scopeFilter($query, array $filters) //Post::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query)=>
            $query->where('title','like','%' . $search . '%')
                ->orWhere('body','like','%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category){
            $query->whereHas ('category', fn($query) => //where the post has category
            $query->where('slug', $category)    //specifically a slug that matches $category
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            $query->whereHas ('author', fn($query) => //where the post has author
            $query->where('username', $author)    //specifically a username that matches $author
            );
        });
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function author () {//usually follow the foreign key ie user in the database, but can also follow what we want, just need to specify inside
        return $this->belongsTo(User::class,'user_id');
    }
}
