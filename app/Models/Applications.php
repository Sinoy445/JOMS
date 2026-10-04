<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'job_id',
        'name',
        'email',
        'application_status_id',
        'phoneNumber',
        'reasonSuitable',
        'curriculumVitae',
        'resume'
    ];

    public function job () {
        return $this->belongsTo(Job::class);
    }

    public function applicant () {//usually follow the foreign key ie user in the database, but can also follow what we want, just need to specify inside
        return $this->belongsTo(User::class,'user_id');
    }

    public function appStatus () { // $applications -> status
        return $this->belongsTo(ApplicationStatus::class,'application_status_id');
    }

}
