<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function index()
    {
        return view('people.index', [
            'jobseekers' =>  User::with('jobs','location')->where('role','=','Jobseeker')->oldest()->filter(
                request(['search', 'location_checkbox'])
            )->paginate(6)->withQueryString(),               //$this->getPosts(),
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }

    public function show(User $user)
    {
        return view ('people.show', [
            'talent' => $user,
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }



    public function searchFilter()
    {
        return view('people.index', [
            'jobseekers' =>  User::with('jobs')->where('role','=','Jobseeker')->oldest()->filter(
                request(['searchTalent', 'location_checkbox'])
            )->paginate(6)->withQueryString(),               //$this->getPosts(),
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }
}
