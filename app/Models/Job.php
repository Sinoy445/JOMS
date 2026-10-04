<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = []; //means it doesn't guard against any mass-assignment !! only for data which we developers are in control of

    public function scopeFilter($query, array $filters) //Job::newQuery()->filter()
    {
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query)=>
            $query->where('name','like','%' . $search . '%')
                ->orWhere('excerpt','like','%' . $search . '%')
                ->orWhere('description','like','%' . $search . '%')
            );
        });

        $query->when($filters['location'] ?? false, function ($query, $location){
            $query->whereHas ('location', fn($query) => //where the post has location
            $query->where('slug', $location)    //specifically a slug that matches $location
            );
        });

        $query->when($filters['tag_checkbox'] ?? false, function ($query, $tag){
            $query->whereHas ('listtags', fn($query) => //where the post has listtags
            $query->join('tags', 'job_tag_lists.tag_id','=', 'tags.id')
                ->whereIn('slug', $tag)    //specifically a slug that matches $category
            );
        });

        $query->when($filters['location_checkbox'] ?? false, function ($query, $location){
            $query->whereHas ('location', fn($query) => //where the post has location
            $query->whereIn('slug', $location)    //specifically a slug that matches $location
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            $query->whereHas ('author', fn($query) => //where the post has author
            $query->where([['username', $author]])    //specifically a username that matches $author
            );
        });

        $query->when($filters['tag'] ?? false, function ($query, $tag){
            $query->whereHas ('listtags', fn($query) => //where the post has listtags
            $query->join('tags', 'job_tag_lists.tag_id','=', 'tags.id')
            ->where('slug', $tag)    //specifically a slug that matches $tag
            );
        });



    }

    public function author () {//usually follow the foreign key ie user in the database, but can also follow what we want, just need to specify inside
        return $this->belongsTo(User::class,'user_id');
    }

    public function listtags() {
        return $this->hasMany(JobTagList::class);
    }

    public function location () {
        return $this->belongsTo(Location::class);
    }

}
