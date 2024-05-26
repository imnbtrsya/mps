<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertDomain;

class ExpertController extends Controller
{
    public function FindExpert(){
        return view('manage_expertdomain.FindExpert');
    }

    public function UploadExpert(){
        return view('manage_expertdomain.UploadExpert');
    }

    public function MyExpertList(){
        $expertdomain = ExpertDomain::all();
        return view('manage_expertdomain.MyExpertList', ['expertdomain' => $expertdomain]);
    }
}
