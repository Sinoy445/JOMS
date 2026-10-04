<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' =>  Job::with('author','listtags', 'location')->latest()->filter(
                request(['search', 'location', 'tag_checkbox','location_checkbox','author', 'tag'])
            )->paginate(6)->withQueryString(),               //$this->getPosts(),
            'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }

    public function show(Job $job)
    {
        return view ('jobs.show', [
            'job' => $job,
            'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }
    public function checkboxFilter()
    {

        return view('jobs.index', [
            'jobs' =>  Job::with('author','listtags', 'location')->latest()->filter(
                request(['search', 'tag_checkbox', 'location_checkbox','author', 'tag' ])
            )->paginate(6)->withQueryString(),               //$this->getPosts(),
            'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }
}
