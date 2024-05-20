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
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'Pb_type' => 'required',
            'Pb_title' => 'required',
            'Pb_authors' => 'required',
            'Pb_belongs' => 'required',
            'Pb_date' => 'required|date',
            'Pb_DOI' => 'nullable',
            'Pb_abstract' => 'nullable',
            'Pb_file' => 'required|file|mimes:pdf|max:10240' // Only PDF files up to 10MB
        ]);
    
        if ($request->hasFile('Pb_file')) {
            $file = $request->file('Pb_file');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $originalFilename, 'public');
            $data['Pb_file_path'] = $filePath;
        }

        $data['Pb_file_path'] = $data['Pb_file_path'] ?? '';
    
        Publication::create($data);
    
        return redirect()->route('manage_publication.PlatinumMyPublication')->with('success', 'Publication added successfully.');
    }
    
    public function edit(Publication $publication){
        return view('manage_publication.PlatinumEditPublication', ['publication' => $publication]);
    }

    public function update(Publication $publication, Request $request){
        $data = $request->validate([
            'Pb_type' => 'required',
            'Pb_title' => 'required',
            'Pb_authors' => 'required',
            'Pb_belongs' => 'required',
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

    public function view(Publication $publication){
        return view('manage_publication.PlatinumViewPublication', ['publication' => $publication]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type');
        $publications = collect(); // Initialize an empty collection

        if ($query) {
            if ($type === 'titles') {
                $publications = Publication::where('Pb_title', 'LIKE', "%{$query}%")->get();
            } else if ($type === 'authors') {
                $publications = Publication::where('Pb_authors', 'LIKE', "%{$query}%")->get();
            }
        }

        return view('manage_publication.PlatinumSearchPublication', ['publications' => $publications]);
    }

    public function list(){
        return view('manage_publication.MentorListPublication');
    }
    
}
