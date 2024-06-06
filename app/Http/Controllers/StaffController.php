<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Users;
use App\Models\Mentor;
use Illuminate\Support\Collection;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        $register = Users::all();
        $mentors = Mentor::all();

        $combined = new Collection();

        foreach ($staff as $person) {
            $person->type = 'staff';
            $combined->push($person);
        }

        foreach ($register as $platinum) {
            $platinum->type = 'platinum';
            $combined->push($platinum);
        }

        foreach ($mentors as $mentor) {
            $mentor->type = 'mentor';
            $combined->push($mentor);
        }

        return view('manage_registration.AdminlistPlatinum', compact('combined'));
    }
}