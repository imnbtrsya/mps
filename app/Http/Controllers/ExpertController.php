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

    public function saveExpert(Request $request){

        $request->validate([

            'E_Name' => 'required',
            'E_Title' => 'required',
            'E_Email' => 'required',
            'E_Position' => 'required',
            'E_Workplace' => 'required',
            'E_Qualification' => 'required',
            'E_Photo' => 'required|file|mimes:pdf|max:10240',
            'E_CategoryExpertise' => 'nullable',
            'E_GroupExpertise' => 'nullable',
            'E_AreaExpertise' => 'nullable',
            'E_ResearchTitle' => 'required',
            'E_DurationStart' => 'required',
            'E_DurationEnd' => 'required',
            'E_Agent' => 'required',
            'E_Role' => 'required',
            'E_Cost' => 'required',
            'E_Status' => 'required',
            'E_PublicationTitle' => 'required',
            'E_Authors' => 'required',
            'E_PublicationDate' => 'nullable',
            'E_Source' => 'nullable',
            'E_Volume' => 'nullable',
            'E_Pages' => 'nullable',
            'E_Publisher' => 'nullable',
            'E_Link' => 'nullable',
        ]);

        if ($request->hasFile('E_Photo')) {
            $file = $request->file('E_Photo');
            $originalFilename = $file->getClientOriginalName();
            $filePath = $file->storeAs('expertdomain', $originalFilename, 'public');
            $data['E_PhotoPath'] = $filePath;
        }

        $data['E_PhotoPath'] = $data['E_PhotoPath'] ?? '';
    
        ExpertDomain::create($data);

        return redirect()->route('manage_expertdomain.ViewExpert')->with('success', 'Expert added successfully.');
    }

    public function view(ExpertDomain $expertdomain){
        return view('manage_expertdomain.ViewExpert', ['expertdomain' => $expertdomain]);
    }

    public function viewPublication(ExpertDomain $expertdomain){
        return view('manage_expertdomain.ViewPublication', ['expertdomain' => $expertdomain]);
    }

    public function MyExpertList(){
        $expertdomain = ExpertDomain::all();
        return view('manage_expertdomain.MyExpertList', ['expertdomain' => $expertdomain]);
    }
}
