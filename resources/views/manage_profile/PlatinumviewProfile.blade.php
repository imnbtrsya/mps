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
    <div class="form-title">My Profile</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif

        @if($register)
        <form method="post" action="{{url('saveRegistration')}}">
            @csrf
            <div class="form-group">
                <h6 style="display: inline;">Name: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Name }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Identity Card Number: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_IC }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Gender: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Gender }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Religion: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Religion }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Race: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Race }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Citizenship: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Citizenship }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Address: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_Address }}</p>
            </div>
            <div class="form-group">
                <h6 style="display: inline;">Phone Number: <span style="color: red;"></span></h6>
                <p id="ic" class="form-control-static" style="display: inline; margin-left: 10px;">{{ $register->P_PhoneNum }}</p>
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
            <span>
                <a href ="{{url('/#')}}" class="btn btn-danger">Back</a>
                <a href="{{ route('manage_profile.PlatinumeditProfile', ['id' => $register->P_ID]) }}" class="btn btn-primary float-right">Update Profile</a>
            </span>
        </form>
        @else
        <div class="alert alert-danger" role="alert">
            User not found.
        </div>
        @endif
    </div>
</div>

@endsection
