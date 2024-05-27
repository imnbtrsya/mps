@extends('layouts/masterPlatinum')
@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    header {
        margin-bottom: 20px;
    }

    header h1 {
        margin: 0;
    }

    header nav {
        font-size: 14px;
        margin-top: 5px;
    }

    .profile-container {
        display: flex;
        justify-content: space-between;
    }

    .profile-details {
        width: 65%;
    }

    .profile-photo {
        width: 30%;
        text-align: center;
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
    }

    .profile-photo img {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .profile-photo p {
        margin-top: 10px;
        font-weight: bold;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }

    .profile-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .profile-table .section-title {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

</style>


<body>
    <div class="container">
        <div class="profile-container">
            <div class="profile-details">
                <table class="profile-table">
                    <tr>
                        <td colspan="2" class="section-title">PERSONAL DETAIL</td>
                    </tr>
                    <tr>
                        <td colspan="2">Title:
                        {{ $expertdomain->E_Title }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Permanent Position:
                        {{ $expertdomain->E_Position }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Workplace:
                        {{ $expertdomain->E_Workplace }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Qualification:
                        {{ $expertdomain->E_Qualification }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">FIELD</td>
                    </tr>
                    <tr>
                        <td colspan="2">Category of Expertise:
                        {{ $expertdomain->E_CategoryExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Group of Expertise:
                        {{ $expertdomain->E_GroupExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Area of Expertise:
                        {{ $expertdomain->E_AreaExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">RESEARCH (Title, Duration, Agent, Role, Cost, Status)</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{ $expertdomain->E_ResearchTitle }}, {{ $expertdomain->E_DurationStart }} - {{ $expertdomain->E_DurationEnd }},
                        {{ $expertdomain->E_Agent }}, {{ $expertdomain->E_Role }}, {{ $expertdomain->E_Cost }}, {{ $expertdomain->E_Status }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">PUBLICATION</td>
                    </tr>
                    <tr>
                        <td>TITLE</td>
                        <td>YEAR</td>
                    </tr>
                    <tr>
                        <td>{{ $expertdomain->E_PublicationTitle }}</td>
                        <td>{{ $expertdomain->E_PublicationDate }}</td>
                    </tr>
                </table>
            </div>
            <div class="profile-photo">
                <img src="{{ $expertdomain->E_Photo }}" alt="Expert Photo">
                <p>{{ $expertdomain->E_Title }} {{ $expertdomain->E_Name }}</p>
                <p>{{ $expertdomain->E_Email }}</p>
            </div>
        </div>
    </div>
</body>
@endsection