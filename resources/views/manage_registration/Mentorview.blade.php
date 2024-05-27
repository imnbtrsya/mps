@extends('layouts/masterMentor')
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
    <div class="form-title">Platinum Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{url('saveRegistration')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name: <span style="color: red;">*</span></label>
                <input type="text" id="name" class="form-control" value="{{ $register->P_Name }}" readonly>
            </div>
            <div class="form-group">
                <label for="ic">Identity Card Number: <span style="color: red;">*</span></label>
                <input type="text" id="ic" class="form-control" value="{{ $register->P_IC }}" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Gender: <span style="color: red;">*</span></label>
                <input type="text" id="gender" class="form-control" value="{{ $register->P_Gender }}" readonly>
            </div>
            <div class="form-group">
                <label for="religion">Religion: <span style="color: red;">*</span></label>
                <input type="text" id="religion" class="form-control" value="{{ $register->P_Religion }}" readonly>
            </div>
            <div class="form-group">
                <label for="race">Race: <span style="color: red;">*</span></label>
                <input type="text" id="race" class="form-control" value="{{ $register->P_Race }}" readonly>
            </div>
            <div class="form-group">
                <label for="citizen">Citizenship: <span style="color: red;">*</span></label>
                <input type="text" id="citizen" class="form-control" value="{{ $register->P_Citizenship }}" readonly>
            </div>
            <div class="form-group">
                <label for="address">Address: <span style="color: red;">*</span></label>
                <input type="text" id="address" class="form-control" value="{{ $register->P_Address }}" readonly>
            </div>
            <div class="form-group">
                <label for="phonenum">Phone Number: <span style="color: red;">*</span></label>
                <input type="text" id="phonenum" class="form-control" value="{{ $register->P_PhoneNum }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email: <span style="color: red;">*</span></label>
                <input type="text" id="email" class="form-control" value="{{ $register->P_Email }}" readonly>
            </div>
            <div class="form-group">
                <label for="fb">Facebook Name: <span style="color: red;">*</span></label>
                <input type="text" id="fb" class="form-control" value="{{ $register->P_FBName }}" readonly>
            </div>
            <div class="form-group">
                <label for="edulevel">Education Level: <span style="color: red;">*</span></label>
                <input type="text" id="edulevel" class="form-control" value="{{ $register->P_EduLevel }}" readonly>
            </div>
            <div class="form-group">
                <label for="edufield">Education Field: <span style="color: red;">*</span></label>
                <input type="text" id="edufield" class="form-control" value="{{ $register->P_EduField }}" readonly>
            </div>
            <div class="form-group">
                <label for="eduinst">Education Institute: <span style="color: red;">*</span></label>
                <input type="text" id="eduinst" name="P_EduInst" class="form-control" value="{{ $register->P_EduInst }}" readonly>
            </div>
            <div class="form-group">
                <label for="occupation">Occupation: <span style="color: red;">*</span></label>
                <input type="text" id="occupation" class="form-control" value="{{ $register->P_Occupation }}" readonly>
            </div>
            <div class="form-group">
                <label for="sponsor">Study Sponsorship: <span style="color: red;">*</span></label>
                <input type="text" id="sponsor" class="form-control" value="{{ $register->P_Stud_Sponsor }}" readonly>
            </div>
            <div class="form-group">
                <label for="batch">Batch: <span style="color: red;">*</span></label>
                <input type="text" id="batch" class="form-control" value="{{ $register->P_Batch }}" readonly>
            </div>
            <div class="form-group">
                <label for="referral">Referral Number: <span style="color: red;">*</span></label>
                <input type="text" id="referral" class="form-control" value="{{ $register->P_Referral }}" required>
            </div>
            <div class="form-group">
                <label for="refname">Referral Name: <span style="color: red;">*</span></label>
                <input type="text" id="refname" class="form-control" value="{{ $register->P_RefName }}" readonly>
            </div>
            <div class="form-group">
                <label for="refbatch">Referral Batch: <span style="color: red;">*</span></label>
                <input type="text" id="refbatch" class="form-control" value="{{ $register->P_RefBatch }}" readonly>
            </div>
            <div class="form-group">
                <label for="date">Date of Application: <span style="color: red;">*</span></label>
                <input type="text" id="date" class="form-control" value="{{ $register->P_DOApp }}" readonly>
            </div>
            <a href ="{{url('/mentorList')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>

@endsection