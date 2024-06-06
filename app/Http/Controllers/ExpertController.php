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

        $data = $request->validate([

            'E_Name' => 'required',
            'E_Title' => 'required',
            'E_Email' => 'required',
            'E_Position' => 'required',
            'E_Workplace' => 'required',
            'E_Qualification' => 'required',
            'E_Photo' => 'required|file|max:10240',
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

        return redireect()->route('manage_expertdomain.MyExpertList');
    }

    public function view(ExpertDomain $expertdomain){
        return view('manage_expertdomain.ViewExpert', ['expertdomain' => $expertdomain]);
    }

    public function viewPublication(ExpertDomain $expertdomain){
        return view('manage_expertdomain.ViewPublication', ['expertdomain' => $expertdomain]);
    }

    public function edit(ExpertDomain $expertdomain){
        return view('manage_expertdomain.EditExpert', ['expertdomain' => $expertdomain]);
    }

    public function update(Request $request, ExpertDomain $expertdomain){

        $data = $request->validate([

            'E_Name' => 'required',
            'E_Title' => 'required',
            'E_Email' => 'required',
            'E_Position' => 'required',
            'E_Workplace' => 'required',
            'E_Qualification' => 'required',
            'E_Photo' => 'required|file|max:10240',
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
    
        ExpertDomain::update($data);

        return redireect()->route('manage_expertdomain.MyExpertList');
}


    public function MyExpertList(){
        $expertdomain = ExpertDomain::all();
        return view('manage_expertdomain.MyExpertList', ['expertdomain' => $expertdomain]);
    }

    public function find(Request $request){ 

        $query = $request->input('q');
        $type = $request->input('type');
        $expertdomain = collect();

        if ($query && in_array($type, ['name', 'research', 'publication', 'category', 'group', 'area'])) {
            switch ($type) {
                case 'name':
                    $expertdomain = ExpertDomain::where('E_Name', 'LIKE', "%{$query}%")->get();
                    break;
                case 'research':
                    $expertdomain = ExpertDomain::where('E_ResearchTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'publication':
                    $expertdomain = ExpertDomain::where('E_PublicationTitle', 'LIKE', "%{$query}%")->get();
                    break;
                case 'category':
                    $expertdomain = ExpertDomain::where('E_CategoryExpertise', 'LIKE', "%{$query}%")->get();
                    break;
                case 'group':
                    $expertdomain = ExpertDomain::where('E_GroupExpertise', 'LIKE', "%{$query}%")->get();
                    break;
                case 'area':
                    $expertdomain = ExpertDomain::where('E_AreaExpertise', 'LIKE', "%{$query}%")->get();
                    break;
            }
        }

        return view('manage_expertdomain.FindExpert', ['expertdomain' => $expertdomain]);
    }

    public function delete(ExpertDomain $expertdomain){
        $expertdomain->delete();
        return redirect()->route('manage_expertdomain.MyExpertList')->with('success', 'Expert deleted successfully.');
    }
}
