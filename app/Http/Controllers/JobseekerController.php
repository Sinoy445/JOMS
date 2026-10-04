<?php

namespace App\Http\Controllers;

use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobseekerController extends Controller
{
    public function index()
    {
        return view('jobseeker.profile', [
            'user' =>  auth()->user(),               //$this->getPosts(),
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }

    public function show()
    {
        return view ('jobseeker.update', [
            'user' => auth()->user(),
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }

    public function update(){
        $user= auth()->user();

//        $attributes = array_merge($this->validate([
//            'name' => ['required','max:255'],
//            'username' => ['required','min:3','max:255', Rule::unique('users','username')],
//            'email' => ['required','email','max:255', Rule::unique('users','email',)],
//            'password' => ['required','min:7','max:255']
//        ]), [
//            'id' => $user->id,
//            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
//        ]);
        $attributes = request()->validate([
            'personalIntroduction' => ['required'],
            'educationBackground' => ['required'],
            'workExperience' => ['required'],
            'skillsInterest' => ['required']
        ]);



        Jobseeker::where('user_id','=',$user->id)->update($attributes);
        return redirect('/jobseeker/profile')->with('success', 'Profile Updated!');
    }
//
//    public function searchFilter()
//    {
//        return view('people.index', [
//            'jobseekers' =>  User::with('jobs')->latest()->filter(
//                request(['search'])
//            )->paginate(6)->withQueryString(),               //$this->getPosts(),
//            //'tags' =>  Tag::with('listjobs')->latest()->get(),
//        ]);
//    }
}
