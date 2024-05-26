@extends('layouts/masterPlatinum')
@section('content')

<style>
    .search-container {
        text-align: center;
        margin-top: 50px;
    }

    .search-form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .search-form input[type="text"] {
        width: 300px; 
        margin-bottom: 10px;
    }

    .search-form button[type="submit"] {
        cursor: pointer;
        background-color: #75CE9F;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .intro-text {
        font-style: italic;
        text-align: center;
        font-size: 25px;
        margin-bottom: 150px;
    }

    .main-text {
        font-style: italic;
        text-align: center;
        font-size: 18px;
    }
</style>

<div class="intro-text">
    <p>FIND EXPERTISE, CONNECT EFFORTLESSLY, EXCEL BEYOND LIMITS</p>
</div>

<div class="main-text">
    <p>Here's where you discover experts in your field, allowing</p>
    <p>you to interact directly with them, and gain valuable</p>
    <p>knowledge to your needs</p>
</div>

<div class="search-container">
    <div class="search-form">
        <form action="/search" method="get">
            <input type="text" name="q" placeholder="Search by Name, Research or Field">
        </form>
        <form action="/search" method="get">
            <button type="submit">Search</button>
        </form>
    </div>
</div>


@endsection