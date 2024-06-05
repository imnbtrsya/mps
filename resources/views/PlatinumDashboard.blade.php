@extends('layouts/masterPlatinum')
@section('content')

<style>
    .dashboard-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .dashboard-header {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .dashboard-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        width: 100%;
        max-width: 1200px;
    }

    .dashboard-card {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 300px;
        text-align: center;
    }

    .dashboard-card h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .dashboard-card p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .dashboard-card a {
        display: block;
        margin-top: 10px;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .dashboard-card a:hover {
        background-color: #0056b3;
    }

    .header-image {
        width: 100%;
        height: 33vh;
        background-image: url('{{ asset('uploads/seminar.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>

<div class="header-image"></div>

<div class="dashboard-container">
    <div class="dashboard-header">Platinum Dashboard</div>
    <div class="dashboard-content">
        <!-- Profile Overview Card -->
        <div class="dashboard-card">
            <h3>Profile Overview</h3>
            <img src="{{ asset('uploads/seminar.jpg') }}" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 10px;">
        </div>


    </div>
</div>

@endsection

