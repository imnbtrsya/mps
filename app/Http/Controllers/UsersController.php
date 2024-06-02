<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LoginDetails;
use App\Models\Users;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $last6digit = substr($request->P_IC, -6); //  6 digit last ic
        $password = Hash::make($last6digit); 

        $newuser = new User();
        $newuser->name = $request->P_Name;
        $newuser->email = $request->P_Email;
        $newuser->password = $password;
        $newuser->role = "platinum";
        
        if($newuser->save()){

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

        }else{
            return redirect()->back()->with('error','Error!');
        }
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
        $register = Users::where('P_ID', '=', $P_ID)->first();
    
        if (!$register) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        return view('manage_profile.PlatinumviewProfile', compact('register'));
    }    

    public function editProfile($P_ID){
        // Fetch the user record by P_ID
        $register = Users::findOrFail($P_ID);
        
        // Return the view with the user data
        return view('manage_profile.PlatinumeditProfile', compact('register'));
    }


    // Method to process the update of the record
    public function updateProfile(Request $request, $P_ID){
        // Find the user record by P_ID
        $user = Users::findOrFail($P_ID);

        // Validate the form input
        $request->validate([
            'P_Name' => 'required|string|max:255',
            'P_IC' => 'required|string|max:255',
            'P_Gender' => 'required|string|max:255',
            'P_Religion' => 'required|string|max:255',
            'P_Race' => 'required|string|max:255',
            'P_Citizenship' => 'required|string|max:255',
            'P_Address' => 'required|string|max:255',
            'P_PhoneNum' => 'required|string|max:255',
            'P_Email' => 'required|email|max:255',
            'P_FBName' => 'required|string|max:255',
            'P_EduLevel' => 'required|string|max:255',
            'P_EduField' => 'required|string|max:255',
            'P_EduInst' => 'required|string|max:255',
            'P_Occupation' => 'required|string|max:255',
            'P_Stud_Sponsor' => 'required|string|max:255',
            'P_Batch' => 'required|string|max:255',
            'P_Referral' => 'required|string|max:255',
            'P_RefName' => 'required|string|max:255',
            'P_RefBatch' => 'required|string|max:255',
            'P_DOApp' => 'required|string|max:255',
        ]);

        // Update user details
        $user->P_Name = $request->input('P_Name');
        $user->P_IC = $request->input('P_IC');
        $user->P_Gender = $request->input('P_Gender');
        $user->P_Religion = $request->input('P_Religion');
        $user->P_Race = $request->input('P_Race');
        $user->P_Citizenship = $request->input('P_Citizenship');
        $user->P_Address = $request->input('P_Address');
        $user->P_PhoneNum = $request->input('P_PhoneNum');
        $user->P_Email = $request->input('P_Email');
        $user->P_FBName = $request->input('P_FBName');
        $user->P_EduLevel = $request->input('P_EduLevel');
        $user->P_EduField = $request->input('P_EduField');
        $user->P_EduInst = $request->input('P_EduInst');
        $user->P_Occupation = $request->input('P_Occupation');
        $user->P_Stud_Sponsor = $request->input('P_Stud_Sponsor');
        $user->P_Batch = $request->input('P_Batch');
        $user->P_Referral = $request->input('P_Referral');
        $user->P_RefName = $request->input('P_RefName');
        $user->P_RefBatch = $request->input('P_RefBatch');
        $user->P_DOApp = $request->input('P_DOApp');

        // Save the updated user record
        $user->save();

        // Redirect back to the view profile page with a success message
        return redirect()->route('manage_profile.PlatinumviewProfile', ['id' => $user->P_ID])->with('success', 'Profile updated successfully');
    }
    
    

    public function MentorlistPlatinum(){
        $register = Users::get();
        return view('manage_registration.MentorlistPlatinum', compact ('register'));
    }
}