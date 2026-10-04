<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTagList extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jobs () {
        return $this->belongsTo(Job::class);
    }

    public function tags () {
        return $this->belongsTo(Tag::class);
    }
}
