@extends('layouts/masterPlatinum')
@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .center {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 40px;
        margin: 20px;
        justify-content: center;
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
        align-items: center;
        gap: 20px;
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
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-photo p {
        margin-top: 10px;
        font-weight: italic;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
    }

    .profile-table td {
        border: 1px solid #ddd;
        padding: 12px;
    }

    .profile-table .section-title {
        background-color: #eee;
        font-weight: bold;
    }

    .back-button {
        margin-top: 20px;
        width: 200px; 
        padding: 10px 20px;
        font-size: 1.1rem;
        color: #ffffff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: center;
    }

    .back-button:hover {
        background-color: #0056b3;
    }

</style>

<script>
    document.querySelector(".publication-link").addEventListener("click", function() {
        var url = "manage_expertdomain.ViewPublication";
            window.location.href = url;
    });

    document.getElementById("link-button").addEventListener("click", function() {
        var linkUrl = @json($expertdomain->E_Link);
        if (Array.isArray(linkUrl)) {
            linkUrl = linkUrl.join(', '); // Handle the array as needed
        }
        window.open(linkUrl, "_blank");
    });

    function goBack() {
        window.history.back();
    }
</script>

<div class="center">
<body>
        <div class="profile-container">
            <div class="profile-details">
                <table class="profile-table">
                    <tr>
                        <td colspan="2" class="section-title">PERSONAL DETAIL</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Title:</b>
                        {{ is_array($expertdomain->E_Title) ? implode(', ', $expertdomain->E_Title) : $expertdomain->E_Title }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Permanent Position:</b>
                        {{ is_array($expertdomain->E_Position) ? implode(', ', $expertdomain->E_Position) : $expertdomain->E_Position }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Workplace:</b>
                        {{ is_array($expertdomain->E_Workplace) ? implode(', ', $expertdomain->E_Workplace) : $expertdomain->E_Workplace }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Qualification:</b>
                        {{ is_array($expertdomain->E_Qualification) ? implode(', ', $expertdomain->E_Qualification) : $expertdomain->E_Qualification }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">FIELD</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Category of Expertise:</b>
                        {{ is_array($expertdomain->E_CategoryExpertise) ? implode(', ', $expertdomain->E_CategoryExpertise) : $expertdomain->E_CategoryExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Group of Expertise:</b>
                        {{ is_array($expertdomain->E_GroupExpertise) ? implode(', ', $expertdomain->E_GroupExpertise) : $expertdomain->E_GroupExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Area of Expertise:</b>
                        {{ is_array($expertdomain->E_AreaExpertise) ? implode(', ', $expertdomain->E_AreaExpertise) : $expertdomain->E_AreaExpertise }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">RESEARCH (Title, Duration, Agent, Role, Cost, Status)</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{ is_array($expertdomain->E_ResearchTitle) ? implode(', ', $expertdomain->E_ResearchTitle) : $expertdomain->E_ResearchTitle }}, 
                        {{ is_array($expertdomain->E_DurationStart) ? implode(', ', $expertdomain->E_DurationStart) : $expertdomain->E_DurationStart }} - 
                        {{ is_array($expertdomain->E_DurationEnd) ? implode(', ', $expertdomain->E_DurationEnd) : $expertdomain->E_DurationEnd }},
                        {{ is_array($expertdomain->E_Agent) ? implode(', ', $expertdomain->E_Agent) : $expertdomain->E_Agent }}, 
                        {{ is_array($expertdomain->E_Role) ? implode(', ', $expertdomain->E_Role) : $expertdomain->E_Role }}, 
                        {{ is_array($expertdomain->E_Cost) ? implode(', ', $expertdomain->E_Cost) : $expertdomain->E_Cost }}, 
                        {{ is_array($expertdomain->E_Status) ? implode(', ', $expertdomain->E_Status) : $expertdomain->E_Status }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="section-title">PUBLICATION</td>
                    </tr>
                    <tr>
                        <td><b>TITLE</b></td>
                        <td><b>YEAR</b></td>
                    </tr>
                    <tr>
                        <td class="publication-link">
                        <a href="{{ route('manage_expertdomain.ViewPublication', ['expertdomain' => $expertdomain->E_ID]) }}">                            
                            {{ is_array($expertdomain->E_PublicationTitle) ? implode(', ', $expertdomain->E_PublicationTitle) : $expertdomain->E_PublicationTitle }}</a></td>
                        <td>{{ is_array($expertdomain->E_PublicationDate) ? implode(', ', $expertdomain->E_PublicationDate) : $expertdomain->E_PublicationDate }}</td>
                    </tr>
                </table>
            </div>
            <div class="profile-photo">
                <img src="{{ asset($expertdomain->E_Photo) }}" alt="Expert Photo">
                <p><b>{{ is_array($expertdomain->E_Title) ? implode(', ', $expertdomain->E_Title) : $expertdomain->E_Title }} 
                {{ is_array($expertdomain->E_Name) ? implode(', ', $expertdomain->E_Name) : $expertdomain->E_Name }}</b></p>
                <p>{{ is_array($expertdomain->E_Email) ? implode(', ', $expertdomain->E_Email) : $expertdomain->E_Email }}</p>
            </div>
        </div>
        <button class="back-button" onclick="goBack()">Back</button>
</body>
</div>
@endsection
