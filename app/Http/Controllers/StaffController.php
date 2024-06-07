<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Users;
use App\Models\Mentor;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $university = $request->query('university');
        
        $staff = Staff::all();
        $register = Users::all();
        $mentors = Mentor::all();

        $combined = collect();

        foreach ($staff as $person) {
            $person->type = 'staff';
            $combined->push($person);
        }

        foreach ($register as $platinum) {
            $platinum->type = 'platinum';
            $combined->push($platinum);
        }

        foreach ($mentors as $mentor) {
            $mentor->type = 'mentor';
            $combined->push($mentor);
        }

        if ($filter) {
            $combined = $combined->where('type', $filter);

            if ($filter == 'platinum' && $university) {
                $combined = $combined->where('P_EduInst', $university);
            }
        }

        $universities = $register->pluck('P_EduInst')->unique();

        return view('manage_registration.StafflistUsers', compact('combined', 'universities'));
    }

    public function generateReport(Request $request)
    {
        $university = $request->query('university');
        
        if (!$university) {
            return redirect()->back()->with('error', 'No university selected');
        }

        $register = Users::where('P_EduInst', $university)->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=report.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Name', 'IC', 'Gender', 'Address', 'Phone', 'Email'];

        $callback = function() use ($register, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($register as $user) {
                fputcsv($file, [
                    $user->P_Name,
                    $user->P_IC,
                    $user->P_Gender,
                    $user->P_Address,
                    $user->P_PhoneNum,
                    $user->P_Email
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function viewStaff($id)
    {
        $staff = Staff::findOrFail($id);
        return view('manage_profile.StaffViewStaffprofile', compact('staff'));
    }

    public function viewMentor($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('manage_profile.StaffViewMentorprofile', compact('mentor'));
    }

    public function indexMentor()
    {
        $staff = Staff::all();
        $register = Users::all();
        $mentors = Mentor::all();

        $combine = collect();

        foreach ($staff as $person) {
            $person->type = 'staff';
            $combine->push($person);
        }

        foreach ($register as $platinum) {
            $platinum->type = 'platinum';
            $combine->push($platinum);
        }

        foreach ($mentors as $mentor) {
            $mentor->type = 'mentor';
            $combine->push($mentor);
        }

        return view('manage_registration.MentorlistUsers', compact('combine'));
    }

    public function showMentorProfile($id)
    {
        $mentor = Mentor::where('user_id', $id)->first();

        if (!$mentor) {
            return view('manage_profile.mentor_view_profile')->withErrors('Mentor not found.');
        }

        return view('manage_profile.mentor_view_profile', compact('mentor'));
    }

    public function editMentorProfile($id)
    {
        $mentor = Mentor::where('user_id', $id)->first();

        if (!$mentor) {
            return redirect()->back()->withErrors('Mentor not found.');
        }

        return view('manage_profile.mentor_edit_profile', compact('mentor'));
    }

    public function updateMentorProfile(Request $request)
    {
        $mentor = Mentor::where('user_id', $request->user_id)->first();

        if (!$mentor) {
            return redirect()->back()->withErrors('Mentor not found.');
        }

        $mentor->M_name = $request->M_name;
        $mentor->M_IC = $request->M_IC;
        $mentor->M_gender = $request->M_gender;
        $mentor->M_address = $request->M_address;
        $mentor->M_phoneNum = $request->M_phoneNum;
        $mentor->M_email = $request->M_email;
        $mentor->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function showStaffProfile($id)
    {
        $staff = Staff::where('user_id', $id)->first();

        if (!$staff) {
            return view('manage_profile.staff_view_profile')->withErrors('Staff not found.');
        }

        return view('manage_profile.staff_view_profile', compact('staff'));
    }

    public function editStaffProfile($id)
    {
        $staff = Staff::where('user_id', $id)->first();

        if (!$staff) {
            return redirect()->back()->withErrors('Staff not found.');
        }

        return view('manage_profile.staff_edit_profile', compact('staff'));
    }

    public function updateStaffProfile(Request $request)
    {
        $staff = Staff::where('user_id', $request->user_id)->first();

        if (!$staff) {
            return redirect()->back()->withErrors('Staff not found.');
        }

        $staff->S_name = $request->S_name;
        $staff->S_IC = $request->S_IC;
        $staff->S_gender = $request->S_gender;
        $staff->S_address = $request->S_address;
        $staff->S_phoneNum = $request->S_phoneNum;
        $staff->S_email = $request->S_email;
        $staff->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}