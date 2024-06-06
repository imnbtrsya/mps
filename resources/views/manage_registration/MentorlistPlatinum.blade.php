@extends('layouts/masterMentor')
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

    .custom-table {
        width: 80%;
        border-collapse: collapse;
    }

    .custom-table th, .custom-table td {
        padding: 15px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .custom-table th {
        background-color: #f9f9f9;
    }
</style>

<div class="custom-container">
    <h1 class="custom-header">List of User</h1>
    <table class="custom-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Platinum's Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php $counter = 1; @endphp
            @foreach ($register as $platinum)
            <tr>
                <td>{{$counter}}</td>
                <td>{{$platinum->P_Name}}</td>
                <td><a href="{{ url('mentor/register/MentorviewRegister/' . $platinum->P_ID) }}" class="btn btn-primary">View</a></td>
                </td>
            </tr>
            </tr>
            @php $counter++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection