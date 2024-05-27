<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LoginDetails;
use App\Models\Users;

class UsersController extends Controller
{
    public function listPlatinum(){
        $register = Users::get();
        return view('manage_registration.listPlatinum', compact ('register'));
    }
    
    public function addregister(){
        return view('manage_registration.addRegistration');
    }

    public function saveRegistration(Request $request){

        $request->validate([

            'P_Name' => 'required',
            'P_IC' => 'required',
            'P_Gender' => 'required',
            'P_Religion' => 'required',
            'P_Race' => 'required',
            'P_Citizenship' => 'required',
            'P_Address' => 'required',
            'P_PhoneNum' => 'required',
            'P_Email' => 'required',
            'P_FBName' => 'required',
            'P_EduLevel' => 'required',
            'P_EduField' => 'required',
            'P_EduInst' => 'required',
            'P_Occupation' => 'required',
            'P_Stud_Sponsor' => 'required',
            'P_Batch' => 'required',
            'P_Referral' => 'required',
            'P_RefName' => 'required',
            'P_RefBatch' => 'required',
            'P_DOApp' => 'required'

        ]);

        $name = $request->P_Name;
        $ic = $request->P_IC;
        $gender = $request->P_Gender;
        $religion = $request->P_Religion;
        $race = $request->P_Race;
        $citizen = $request->P_Citizenship;
        $address = $request->P_Address;
        $phonenum = $request->P_PhoneNum;
        $email = $request->P_Email;
        $fb = $request->P_FBName;
        $edulevel = $request->P_EduLevel;
        $edufield = $request->P_EduField;
        $eduinst = $request->P_EduInst;
        $occupation = $request->P_Occupation;
        $sponsor = $request->P_Stud_Sponsor;
        $batch = $request->P_Batch;
        $referral = $request->P_Referral;
        $refname = $request->P_RefName;
        $refbatch = $request->P_RefBatch;
        $date = $request->P_DOApp;


        $platinum = new Users();
        $platinum->P_Name = $name;
        $platinum->P_IC = $ic;
        $platinum->P_Gender = $gender;
        $platinum->P_Religion = $religion;
        $platinum->P_Race = $race;
        $platinum->P_Citizenship = $citizen;
        $platinum->P_Address = $address;
        $platinum->P_PhoneNum = $phonenum;
        $platinum->P_Email = $email;
        $platinum->P_FBName = $fb;
        $platinum->P_EduLevel = $edulevel;
        $platinum->P_EduField = $edufield;
        $platinum->P_EduInst = $eduinst;
        $platinum->P_Occupation = $occupation;
        $platinum->P_Stud_Sponsor = $sponsor;
        $platinum->P_Batch = $batch;
        $platinum->P_Referral = $referral;
        $platinum->P_RefName = $refname;
        $platinum->P_RefBatch = $refbatch;
        $platinum->P_DOApp = $date;
        $platinum->save();

        return redirect()->back()->with('success','Platinum added successfully');
    }

    public function viewRegister($P_ID){
        
        $register = Users::where('P_ID','=',$P_ID)->first();

        return view('manage_registration.viewRegistration',compact('register'));
    }

    public function MentorviewRegister($P_ID){
        
        $register = Users::where('P_ID','=',$P_ID)->first();

        return view('manage_registration.Mentorview',compact('register'));
    }

    public function viewProfile($P_ID){
        
        $register = Users::where('P_ID','=',$P_ID)->first();

        return view('manage_profile.PlatinumviewProfile',compact('register'));
    }

    public function MentorlistPlatinum(){
        $register = Users::get();
        return view('manage_registration.MentorlistPlatinum', compact ('register'));
    }
}
