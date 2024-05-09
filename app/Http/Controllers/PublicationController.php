<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function view(){
        return view('manage_publication.PlatinumViewPublication');
    }

    public function upload(){
        return view('manage_publication.PlatinumUploadPublication');
    }
}
