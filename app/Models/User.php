<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'location_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($query, array $filters) //User::newQuery()->filter()
    {
        $query->when($filters['searchTalent'] ?? false, function ($query, $search){
            $query->whereHas('jobseeker',fn($query)=>
            $query->where('users.name','like','%' . $search . '%')
                ->orWhere('users.username','like','%' . $search . '%')
                ->orWhere('jobseekers.personalIntroduction','like','%' . $search . '%')
                ->orWhere('jobseekers.educationBackground','like','%' . $search . '%')
                ->orWhere('jobseekers.workExperience','like','%' . $search . '%')
                ->orWhere('jobseekers.skillsInterest','like','%' . $search . '%')
            );
        });

        $query->when($filters['location_checkbox'] ?? false, function ($query, $location){
            $query->whereHas ('location', fn($query) => //where the user has location
            $query->whereIn('slug', $location)    //specifically a list of slugs that matches $location
            );
        });

    }

    public function setPasswordAttribute($password) { //at any point, when we set $user->password = 'something' this function will be called
        $this->attributes['password'] = bcrypt($password);
    }

    public function jobseeker(){
        return $this->hasMany(Jobseeker::class);
    }

    public function employer(){
        return $this->hasMany(Employer::class);
    }

    public function jobs () { // $user -> jobs
        return $this->hasMany(Job::class);
    }

    public function location () {
        return $this->belongsTo(Location::class);
    }
}
