<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function MyPublication(){
        $publications = Publication::all();
        return view('manage_publication.PlatinumMyPublication', ['publications' => $publications]);
    }

    public function upload(){
        return view('manage_publication.PlatinumUploadPublication');
    }
    
    public function store(Request $request){
        $data = $request->validate([
            'Pb_type' => 'required',
            'Pb_title' => 'required',
            'Pb_authors' => 'required',
            'Pb_date' => 'required',
            'Pb_DOI' => 'nullable',
            'Pb_abstract' => 'nullable'
        ]);
    
        $newPublication = Publication::create($data);
    
        return redirect(route('manage_publication.PlatinumMyPublication'));
    }
    
    public function edit($publicationId){
        // Use the primary key column name that matches your database schema
        $publication = Publication::where('Pb_ID', $publicationId)->first();
        return view('manage_publication.PlatinumEditPublication', ['publication' => $publication]);
    }

    public function update(Publication $publication, Request $request){
        $data = $request->validate([
            'Pb_type' => 'required',
            'Pb_title' => 'required',
            'Pb_authors' => 'required',
            'Pb_date' => 'required',
            'Pb_DOI' => 'nullable',
            'Pb_abstract' => 'nullable'
        ]);
    
        $publication->update($data);

        return redirect(route('manage_publication.PlatinumMyPublication'))->with('success', 'Publication updated successfully');
    }

    public function delete(Publication $publication){
        $publication->delete();
        return redirect(route('manage_publication.PlatinumMyPublication'))->with('success', 'Publication deleted successfully');
    }

    public function view(){
        return view('manage_publication.PlatinumViewPublication');
    }
    
}
