@extends('layouts.masterPlatinum')

@section('content')

<style>
    .custom-body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
    }

    .custom-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
    }

    .custom-header {
        margin-bottom: 20px;
    }

    .custom-form {
        width: 60%;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .custom-form label {
        font-weight: bold;
        margin-top: 10px;
    }

    .custom-form .form-control {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
        pointer-events: none;
    }
</style>

<div class="custom-container">
    <h2 class="custom-header">Research Information Details</h2>
    <div class="custom-form">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" class="form-control" value="{{ $data->RI_title }}" readonly>
        </div>
        <div class="form-group">
            <label for="author">Authors:</label>
            <input type="text" id="author" class="form-control" value="{{ $data->RI_author }}" readonly>
        </div>
        <div class="form-group">
            <label for="abstract">Abstract:</label>
            <input type="text" id="abstract" class="form-control" value="{{ $data->RI_abstract }}" readonly>
        </div>
        <div class="form-group">
                <label for="area">Research Area:</label>
                <input type="text" id="area" class="form-control" value="{{$data->RI_area}}" readonly>
            </div>
            <div class="form-group">
                <label for="objective">Objective:</label>
                <input type="text" id="objective" class="form-control" value="{{$data->RI_objective}}" readonly>
            </div>
            <div class="form-group">
                <label for="method">Methodology:</label>
                <input type="text" id="method" class="form-control" value="{{$data->RI_methodology}}" readonly>
            </div>
            <div class="form-group">
                <label for="background">Research Background:</label>
                <input type="text" id="background" class="form-control" value="{{$data->RI_background}}"readonly>
            </div>
            <div class="form-group">
                <label for="timeline">Timeline:</label>
                <input type="text" id="timeline" class="form-control" value="{{$data->RI_timeline}}" readonly>
            </div>
            <div class="form-group">
                <label for="budget">Budget:</label>
                <input type="text" id="budget" class="form-control" value="{{$data->RI_budget}}"readonly>
            </div>
            <div class="form-group">
                <label for="outcome">Outcome:</label>
                <input type="text" id="outcome" class="form-control" value="{{$data->RI_outcome}}" readonly>
            </div>
        <div class="form-group">
            <label for="reference">Reference:</label>
            <input type="text" id="reference" class="form-control" value="{{ $data->RI_reference }}" readonly>
        </div>
        <div class="form-group">
            <a href="{{ url('/editResearch/' . $data->RI_ID) }}" class="btn btn-primary">Edit</a>
            <a href="{{ url('/deleteResearch/' . $data->RI_ID) }}" class="btn btn-danger">Delete</a>
            <a href ="{{url('research/myresearch')}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>

@endsection



