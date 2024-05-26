<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInformation;

class ResearchController extends Controller
{
    public function ResearchInfo(){
        $data = ResearchInformation::get();
        return view('manage_research.researchInfo', compact ('data'));
    }

    public function addResearch(){
        return view('manage_research.addResearch');
    }

    public function saveResearch(Request $request){

        $request->validate([

            'P_ID' => 'required',
            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_intro' => 'required',
            'RI_reference' => 'required'

        ]);

        $Pid = $request->P_ID;
        $title = $request->RI_title;
        $author = $request->RI_author ?? 'Default Author';
        $abstract = $request->RI_abstract;
        $intro = $request->RI_intro;
        $reference = $request->RI_reference;

        $research = new ResearchInformation();
        $research->P_ID = $Pid;
        $research->RI_title = $title;
        $research->RI_author = $author;
        $research->RI_abstract = $abstract;
        $research->RI_intro = $intro;
        $research->RI_reference = $reference;
        $research->save();

        return redirect()->back()->with('success','Research added successfully');
    }

    public function editResearch($RI_ID){

        $data = ResearchInformation::where('RI_ID','=',$RI_ID)->first();
        return view('manage_research.editResearch',compact('data'));
    }

    public function updateResearch(Request $request){

        $request->validate([

            'P_ID' => 'required',
            'RI_title' => 'required',
            'RI_author' => 'required',
            'RI_abstract' => 'required',
            'RI_intro' => 'required',
            'RI_reference' => 'required'

        ]);

        $RI_ID = $request->RI_ID;
        $Pid = $request->P_ID;
        $title = $request->RI_title;
        $author = $request->RI_author ?? 'Default Author';
        $abstract = $request->RI_abstract;
        $intro = $request->RI_intro;
        $reference = $request->RI_reference;

        ResearchInformation::where('RI_ID','=',$RI_ID)->update([

            'P_ID' => $Pid,
            'RI_title' => $title,
            'RI_author' => $author,
            'RI_abstract' => $abstract,
            'RI_intro' => $intro,
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

        return view('manage_research.viewResearch',compact('data'));
    }

}
