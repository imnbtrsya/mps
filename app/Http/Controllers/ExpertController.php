<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;

class ExpertController extends Controller
{
    public function FindExpert(){
        return view('manage_expertdomain.FindExpert');
    }
}
