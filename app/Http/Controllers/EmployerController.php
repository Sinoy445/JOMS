<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        return view('employer.profile', [
            'user' =>  auth()->user(),               //$this->getPosts(),
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }

    public function show()
    {
        return view ('employer.update', [
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
            'background' => ['required'],
            'culture' => ['required'],
            'typePeople' => ['required'],
            'vacancies' => ['required']
        ]);



        Employer::where('user_id','=',$user->id)->update($attributes);
        return redirect('/employer/profile')->with('success', 'Profile Updated!');
    }

    public function showEmployer (User $user)
    {
        return view ('showEmployer.show', [
            'owner' => $user,
            //'tags' =>  Tag::with('listjobs')->latest()->get(),
        ]);
    }
}
