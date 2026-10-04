<?php

namespace App\View\Components;

use App\Models\Location;
use App\Models\State;
use Illuminate\View\Component;

class LocationDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.location-dropdown', [
            'locations' => Location::with('state')->latest()->get(),
            'states' => State::all()->sortBy('name'),
            'currentLocation' => Location::whereInOrFail('location', request('location_checkbox')),
            'currentState' => State::whereInOrFail('state', request('state_checkbox'))
        ]);
    }
}
