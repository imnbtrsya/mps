<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\ResearchInformation;
use App\Models\ExpertDomain;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class PublicationController extends Controller
{
    public function MyPublication()
    {
        $publications = Publication::paginate(10); // Paginate with 10 items per page
        return view('manage_publication.PlatinumMyPublication', ['publications' => $publications]);
    }


    public function upload()
    {
        $userPlatinumID = auth()->user()->users->P_ID;
        $researches = ResearchInformation::where('P_ID', $userPlatinumID)->get();
        $experts = ExpertDomain::where('P_ID', $userPlatinumID)->get();
        return view('manage_publication.PlatinumUploadPublication' , ['researches' => $researches] , ['experts' => $experts]);
    }

    public function store(Request $request)
    {
        $userPlatinumID = auth()->user()->users->P_ID;

        // Validate request data
        $validatedData = $request->validate([
            'Pb_type' => 'required|string|max:255',
            'Pb_title' => 'required|string|max:255',
            'Pb_belongs' => 'required|string|max:255',
            'Pb_date' => 'required|date',
            'Pb_DOI' => 'nullable|string|max:255',
            'Pb_abstract' => 'nullable|string',
            'Pb_file' => 'required|file|mimes:pdf|max:10240',
            'Pb_peer' => 'required|string|max:255',
            'Pb_journalName' => 'nullable|string|max:255',
            'Pb_volume' => 'nullable|string|max:255',
            'Pb_issue' => 'nullable|string|max:255',
            'Pb_page' => 'nullable|string|max:255',
            'Pb_conferenceName' => 'nullable|string|max:255',
            'Pb_conf_volume' => 'nullable|string|max:255',
            'Pb_conf_issue' => 'nullable|string|max:255',
            'Pb_conf_location' => 'nullable|string|max:255',
            'Pb_existingDOI' => 'nullable|string|max:255',
            'Pb_refers' => 'required|exists:research_information,RI_title',
            'agreement' => 'accepted'
        ]);

        // Handle file upload
        if ($request->hasFile('Pb_file')) {
            $file = $request->file('Pb_file');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $originalFilename, 'public');
            $validatedData['Pb_file_path'] = $filePath;
        }

        // Retrieve RI_ID based on the selected RI_title
        $RI_title = $request->Pb_refers;
        $researchInformation = ResearchInformation::where('P_ID', $userPlatinumID)
                                                ->where('RI_title', $RI_title)
                                                ->first();

        if (!$researchInformation) {
            return redirect()->back()->withErrors(['Pb_refers' => 'Selected research title is not valid for this user.']);
        }

        // Create the publication record
        $publication = new Publication($validatedData);
        $publication->P_ID = $userPlatinumID;
        $publication->RI_ID = $researchInformation->RI_ID;

        // Handle multiple authors
        if ($request->has('Pb_authors')) {
            $authors = $request->input('Pb_authors');
            if (is_array($authors)) {
                // Filter out empty strings and null values
                $authors = array_filter($authors, function($value) { return !is_null($value) && $value !== ''; });
                // Convert the authors array to a string
                $publication->Pb_authors = implode(', ', $authors);

                if(empty($authors)){
                    return redirect()->back()->withErrors(['Pb_authors' => 'The authors field cannot be empty.']);
                }

            } else {
                // Handle the case where Pb_authors is not an array
                $publication->Pb_authors = $authors;

                if(trim($authors) === ''){
                    return redirect()->back()->withErrors(['Pb_authors' => 'The authors field cannot be empty.']);
                }

            }
        }

        $publication->save();

        return redirect()->route('manage_publication.PlatinumMyPublication')->with('success', 'Publication added successfully.');
    }


    public function edit(Publication $publication)
    {
        return view('manage_publication.PlatinumEditPublication', ['publication' => $publication]);
    }

    public function update(Request $request, Publication $publication)
    {
        $data = $request->validate([
            'Pb_type' => 'required|string|max:255',
            'Pb_title' => 'required|string|max:255',
            // 'Pb_authors' => 'required|string|max:255', // This line will be handled separately
            'Pb_belongs' => 'required|string|max:255',
            'Pb_date' => 'required|date',
            'Pb_DOI' => 'nullable|string|max:255',
            'Pb_abstract' => 'nullable|string',
            'Pb_peer' => 'required|string|max:255',
            'Pb_journalName' => 'nullable|string|max:255',
            'Pb_volume' => 'nullable|string|max:255',
            'Pb_issue' => 'nullable|string|max:255',
            'Pb_page' => 'nullable|string|max:255',
            'Pb_conferenceName' => 'nullable|string|max:255',
            'Pb_conf_volume' => 'nullable|string|max:255',
            'Pb_conf_issue' => 'nullable|string|max:255',
            'Pb_conf_location' => 'nullable|string|max:255',
            'Pb_existingDOI' => 'nullable|string|max:255',
            'Pb_refers' => 'required|string|max:255'
        ]);

        // Handle the Pb_authors field
        if ($request->has('Pb_authors')) {
            $authors = $request->input('Pb_authors');
            if (is_array($authors)) {
                // Filter out empty strings and null values
                $authors = array_filter($authors, function($value) { return !is_null($value) && $value !== ''; });
                // Convert the authors array to a string
                $data['Pb_authors'] = implode(', ', $authors);
            } else {
                // Handle the case where Pb_authors is not an array
                $data['Pb_authors'] = $authors;
            }

            if(empty($data['Pb_authors'])){
                return redirect()->back()->withErrors(['Pb_authors' => 'The authors field cannot be empty.']);
            }

        } else {
            // If Pb_authors is not provided, use the existing value
            $data['Pb_authors'] = $publication->Pb_authors;
            if(trim($data['Pb_authors']) === ''){
                return redirect()->back()->withErrors(['Pb_authors' => 'The authors field cannot be empty.']);
            }
        }

        // Handle file upload
        if ($request->hasFile('Pb_file')) {
            $file = $request->file('Pb_file');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->storeAs('publications', $originalFilename, 'public');
            $data['Pb_file_path'] = $filePath;
        }

        // Update the publication with the validated data
        $publication->update($data);

        return redirect()->route('manage_publication.PlatinumMyPublication')->with('success', 'Publication updated successfully.');
    }


    public function delete(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('manage_publication.PlatinumMyPublication')->with('success', 'Publication deleted successfully.');
    }

    public function viewPlatinum(Publication $publication)
    {
        return view('manage_publication.PlatinumViewPublication', ['publication' => $publication]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type');
        $publications = collect();

        if ($query) {
            if ($type === 'titles') {
                $publications = Publication::where('Pb_title', 'LIKE', "%{$query}%")->get();
            } else if ($type === 'authors') {
                $publications = Publication::where('Pb_authors', 'LIKE', "%{$query}%")->get();
            }
        }

        return view('manage_publication.PlatinumSearchPublication', ['publications' => $publications]);
    }

    public function list(Request $request)
    {
        $query = Publication::query();
    
        if ($request->filled('search_query')) {
            $searchQuery = $request->input('search_query');
            $searchType = $request->input('search_type');
    
            if ($searchType === 'title') {
                $query->where('Pb_title', 'LIKE', '%' . $searchQuery . '%');
            } else if ($searchType === 'authors') {
                $query->where('Pb_authors', 'LIKE', '%' . $searchQuery . '%');
            }
        }
    
        if ($request->filled('publication_type')) {
            $publicationType = $request->input('publication_type');
            $query->where('Pb_type', 'LIKE', '%' . $publicationType . '%');
        }
    
        if ($request->filled('ownership_type')) {
            $ownershipType = $request->input('ownership_type');
            $query->where('Pb_belongs', 'LIKE', '%' . $ownershipType . '%');
        }
    
        // Use pagination
        $publications = $query->paginate(10); // 10 items per page
    
        return view('manage_publication.MentorListPublication', ['publications' => $publications]);
    }

    public function viewMentor(Publication $publication)
    {
        return view('manage_publication.MentorViewPublication', ['publication' => $publication]);
    }

    public function generatePDF(Publication $publication)
    {
        // Get the publication title
        $publicationTitle = $publication->Pb_title;
    
        // Replace spaces with underscores and remove special characters
        $cleanTitle = preg_replace('/[^A-Za-z0-9\-]/', '_', $publicationTitle);
    
        // Render the view to a string
        $html = View::make('manage_publication.MentorGeneratePublication', ['publication' => $publication])->render();
    
        // Instantiate Dompdf with options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Load HTML content
        $dompdf->loadHtml($html);
    
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Render the HTML as PDF
        $dompdf->render();
    
        // Output the generated PDF to Browser with custom filename
        return $dompdf->stream('publication_report_' . $cleanTitle . '.pdf');
    }
    

}
