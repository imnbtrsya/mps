<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInformation;
use Illuminate\Support\Facades\Log;

class ResearchController extends Controller
{
    public function ResearchInfo(){
        $userPlatinumID = auth()->user()->users->P_ID;
        $data = ResearchInformation::where('P_ID', $userPlatinumID)->get();

        return view('manage_research.researchInfo', compact ('data'));
    }

    public function addResearch(){
        return view('manage_research.PlatinumaddResearch');
    }

    public function saveResearch(Request $request){

        $request->validate([

            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'RI_timeline' => 'required',
            'RI_budget' => 'required',
            'RI_outcome' => 'required', 
            'RI_reference' => 'required'

        ]);

        $title = $request->RI_title;
        $author = $request->RI_author ?? 'Default Author';
        $abstract = $request->RI_abstract;
        $area = $request->RI_area;
        $objective = $request->RI_objective;
        $method = $request->RI_methodology;
        $background = $request->RI_background;
        $timeline = $request->RI_timeline;
        $budget = $request->RI_budget;
        $outcome = $request->RI_outcome;
        $reference = $request->RI_reference;

        $research = new ResearchInformation();
        $research->P_ID = auth()->user()->users->P_ID;
        $research->RI_title = $title;
        $research->RI_author = $author;
        $research->RI_abstract = $abstract;
        $research->RI_area = $area;
        $research->RI_objective = $objective;
        $research->RI_methodology = $method;
        $research->RI_background = $background;
        $research->RI_timeline = $timeline;
        $research->RI_budget = $budget;
        $research->RI_outcome = $outcome;
        $research->RI_reference = $reference;
        $research->save();

        return redirect()->back()->with('success','Research added successfully');
    }

    public function editResearch($RI_ID){

        $data = ResearchInformation::where('RI_ID','=',$RI_ID)->first();
        return view('manage_research.PlatinumeditResearch',compact('data'));
    }

    public function updateResearch(Request $request){

        $request->validate([

            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_area' => 'required',
            'RI_objective' => 'required',
            'RI_methodology' => 'required',
            'RI_background' => 'required',
            'RI_timeline' => 'required',
            'RI_budget' => 'required',
            'RI_outcome' => 'required', 
            'RI_reference' => 'required'

        ]);

        $RI_ID = $request->RI_ID;
        $title = $request->RI_title;
        $author = $request->RI_author ?? 'Default Author';
        $abstract = $request->RI_abstract;
        $objective = $request->RI_objective;
        $method = $request->RI_methodology;
        $background = $request->RI_background;
        $timeline = $request->RI_timeline;
        $budget = $request->RI_budget;
        $outcome = $request->RI_outcome;
        $area = $request->RI_area;
        $reference = $request->RI_reference;

        ResearchInformation::where('RI_ID','=',$RI_ID)->update([

            'RI_title' => $title,
            'RI_author' => $author,
            'RI_abstract' => $abstract,
            'RI_area' => $area,
            'RI_objective' => $objective,
            'RI_methodology' => $method,
            'RI_background' => $background,
            'RI_timeline' => $timeline,
            'RI_budget' => $budget,
            'RI_outcome' => $outcome, 
            'RI_reference' => $reference

        ]);

        return redirect()->back()->with('success','Research updated successfully');

    }

    public function deleteResearch($RI_ID){

        ResearchInformation::where('RI_ID','=',$RI_ID)->delete();
        return redirect()->back()->with('success','Research deleted successfully');
    }

    public function view($RI_ID){
        
        $data = ResearchInformation::where('RI_ID','=',$RI_ID)->first();

        return view('manage_research.PlatinumviewResearch',compact('data'));
    }

}

