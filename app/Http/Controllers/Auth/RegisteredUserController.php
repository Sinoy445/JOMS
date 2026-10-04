<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Jobseeker;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.jobseeker-register');
    }

    public function createEmployer()
    {
        return view('auth.employer-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validateUser($request);
        //to retrieve location ID based on inputted location by first extracting the city name
        // and then search id by city name
        $locationId = $this->getLocationId();

        $user = User::create([
            'name'=>request('name'),
            'username'=>request('username'),
            'email'=>request('email'),
            'password'=>request('password'),
            'role'=>"Jobseeker",
            'location_id'=>$locationId[0],
        ]);

        Jobseeker::create([
           'user_id'=>$user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);
        session()->flash('success', 'Your account has been created.');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeEmployer(Request $request)
    {
        $this->validateUser($request);

        //to retrieve location ID based on inputted location by first extracting the city name
        // and then search id by city name
        $locationId = $this->getLocationId();

        $user = User::create([
            'name'=>request('name'),
            'username'=>request('username'),
            'email'=>request('email'),
            'password'=>request('password'),
            'role'=>'Employer',
            'location_id'=>$locationId[0],
        ]);

        Employer::create([
            'user_id'=>$user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);
        session()->flash('success', 'Your account has been created.');

        return redirect(RouteServiceProvider::HOME);
    }

    public function autocomplete(Request $request)
    {
        if($request->get('term'))
        {
            $query = $request->get('term');
            $data = DB::table('locations')
                ->join('states', 'locations.state_id', '=' , 'states.id')
                ->select('locations.name as city','states.name as state')
                ->where('locations.name', 'LIKE', "%{$query}%")
                ->get();
            $output='';
            foreach($data as $row)
            {
                $output .= "
                <li class='selectable'><a href='#'>" . $row->city. ", " . $row->state. "</a></li>";
            }
            echo $output;
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validateUser(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'regex:/^\S*$/u', Rule::unique('users', 'username')],
            'email' => ['required', 'string', 'email:dns,filter', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'location' => ['required']
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     * @throws ValidationException
     */
    public function getLocationId(): \Illuminate\Support\Collection
    {
//to retrieve location ID based on inputted location by first extracting the city name and then search id by city name
        $location = explode(",", request()->input('location'));
        $location = $location[0];
        $locationId = DB::table('locations')
            ->select('id')
            ->where('name', 'LIKE', "%{$location}%")
            ->pluck('id');
//        throw ValidationException::withMessages(['location' => $locationId[0]]);

        //if database can't find=invalid city name/ city name doesn't exist in database
        if ($locationId->isEmpty()) {
            throw ValidationException::withMessages(['location' => 'Please type a valid location according to list']);
        }
        return $locationId;
    }
}
