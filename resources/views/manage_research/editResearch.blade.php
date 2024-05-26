@extends('layouts.masterPlatinum')
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
    <div class="form-title">Edit Research Information</div>
    <div class="form-content">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="post" action="{{url('updateResearch')}}">
            @csrf
            <input type="hidden" name="RI_ID" value="{{ $data->RI_ID }}">
            <div class="form-group">
                <label for="title">Title: <span style="color: red;">*</span></label>
                <input type="text" id="title" name="RI_title" placeholder="Enter your title here" value="{{$data->RI_title}}" required>
            </div>
            <div class="form-group">
                <label for="author">Authors: <span style="color: red;">*</span></label>
                <input type="text" id="author" name="RI_author" placeholder="Enter your authors here (put ',' if you have more than 1 author)" value="{{$data->RI_author}}" required>
            </div>
            <div class="form-group">
                <label for="abstract">Abstract: <span style="color: red;">*</span></label>
                <input type="text" id="abstract" name="RI_abstract" placeholder="Enter your abstract" value="{{$data->RI_abstract}}" required>
            </div>
            <div class="form-group">
                <label for="intro">Introduction: <span style="color: red;">*</span></label>
                <input type="text" id="intro" name="RI_intro" placeholder="Enter your title here" value="{{$data->RI_intro}}" required>
            </div>
            <div class="form-group">
                <label for="reference">Reference: <span style="color: red;">*</span></label>
                <input type="text" id="reference" name="RI_reference" placeholder="Enter your title here" value="{{$data->RI_reference}}" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
            <a href ="{{url('research/myresearch')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>

@endsection