@extends('layouts/masterPlatinum')
@section('content')

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    .form-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-required {
        color: red;
        font-size: 16px;
        text-align: center;
        margin-bottom: 10px;
    }

    .form-content {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .form-group button {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #444;
    }
</style>


<div class="form-container">
    <div class="form-title">Update Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{ route('manage_profile.PlatinumupdateProfile', ['id' => $register->P_ID]) }}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div class="form-group">
                <label for="name">Name: <span style="color: red;">*</span></label>
                <input type="text" id="name" name="P_Name" class="form-control" value="{{ $register->P_Name }}" required>
            </div>
            <!-- Identity Card Number -->
            <div class="form-group">
                <label for="ic">Identity Card Number: <span style="color: red;">*</span></label>
                <input type="text" id="ic" name="P_IC" class="form-control" value="{{ $register->P_IC }}" required>
            </div>
            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Gender: <span style="color: red;">*</span></label>
                <input type="text" id="gender" name="P_Gender" class="form-control" value="{{ $register->P_Gender }}" required>
            </div>
            <!-- Religion -->
            <div class="form-group">
                <label for="religion">Religion: <span style="color: red;">*</span></label>
                <input type="text" id="religion" name="P_Religion" class="form-control" value="{{ $register->P_Religion }}" required>
            </div>
            <!-- Race -->
            <div class="form-group">
                <label for="race">Race: <span style="color: red;">*</span></label>
                <input type="text" id="race" name="P_Race" class="form-control" value="{{ $register->P_Race }}" required>
            </div>
            <!-- Citizenship -->
            <div class="form-group">
                <label for="citizen">Citizenship: <span style="color: red;">*</span></label>
                <input type="text" id="citizen" name="P_Citizenship" class="form-control" value="{{ $register->P_Citizenship }}" required>
            </div>
            <!-- Address -->
            <div class="form-group">
                <label for="address">Address: <span style="color: red;">*</span></label>
                <input type="text" id="address" name="P_Address" class="form-control" value="{{ $register->P_Address }}" required>
            </div>
            <!-- Phone Number -->
            <div class="form-group">
                <label for="phonenum">Phone Number: <span style="color: red;">*</span></label>
                <input type="text" id="phonenum" name="P_PhoneNum" class="form-control" value="{{ $register->P_PhoneNum }}" required>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email: <span style="color: red;">*</span></label>
                <input type="email" id="email" name="P_Email" class="form-control" value="{{ $register->P_Email }}" required>
            </div>
            <!-- Facebook Name -->
            <div class="form-group">
                <label for="fb">Facebook Name: <span style="color: red;">*</span></label>
                <input type="text" id="fb" name="P_FBName" class="form-control" value="{{ $register->P_FBName }}" required>
            </div>
            <!-- Education Level -->
            <div class="form-group">
                <label for="edulevel">Education Level: <span style="color: red;">*</span></label>
                <input type="text" id="edulevel" name="P_EduLevel" class="form-control" value="{{ $register->P_EduLevel }}" required>
            </div>
            <!-- Education Field -->
            <div class="form-group">
                <label for="edufield">Education Field: <span style="color: red;">*</span></label>
                <input type="text" id="edufield" name="P_EduField" class="form-control" value="{{ $register->P_EduField }}" required>
            </div>
            <!-- Education Institute -->
            <div class="form-group">
                <label for="eduinst">Education Institute: <span style="color: red;">*</span></label>
                <input type="text" id="eduinst" name="P_EduInst" class="form-control" value="{{ $register->P_EduInst }}" required>
            </div>
            <!-- Occupation -->
            <div class="form-group">
                <label for="occupation">Occupation: <span style="color: red;">*</span></label>
                <input type="text" id="occupation" name="P_Occupation" class="form-control" value="{{ $register->P_Occupation }}" required>
            </div>
            <!-- Study Sponsorship -->
            <div class="form-group">
                <label for="sponsor">Study Sponsorship: <span style="color: red;">*</span></label>
                <input type="text" id="sponsor" name="P_Stud_Sponsor" class="form-control" value="{{ $register->P_Stud_Sponsor }}" required>
            </div>
            <!-- Batch -->
            <div class="form-group">
                <label for="batch">Batch: <span style="color: red;">*</span></label>
                <input type="text" id="batch" name="P_Batch" class="form-control" value="{{ $register->P_Batch }}" required>
            </div>
            <!-- Referral Number -->
            <div class="form-group">
                <label for="referral">Referral Number: <span style="color: red;">*</span></label>
                <input type="text" id="referral" name="P_Referral" class="form-control" value="{{ $register->P_Referral }}" required>
            </div>
            <!-- Referral Name -->
            <div class="form-group">
                <label for="refname">Referral Name: <span style="color: red;">*</span></label>
                <input type="text" id="refname" name="P_RefName" class="form-control" value="{{ $register->P_RefName }}" required>
            </div>
            <!-- Referral Batch -->
            <div class="form-group">
                <label for="refbatch">Referral Batch: <span style="color: red;">*</span></label>
                <input type="text" id="refbatch" name="P_RefBatch" class="form-control" value="{{ $register->P_RefBatch }}" required>
            </div>
            <!-- Date of Application -->
            <div class="form-group">
                <label for="date">Date of Application: <span style="color: red;">*</span></label>
                <input type="text" id="date" name="P_DOApp" class="form-control" value="{{ $register->P_DOApp }}" required>
            </div>
            <span>
                <a href ="{{ route('manage_profile.PlatinumviewProfile', ['id' => $register->P_ID]) }}" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </span>
        </form>
    </div>
</div>


@endsection