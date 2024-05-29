<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .profile-item {
            margin-bottom: 15px;
        }
        .profile-item label {
            font-weight: bold;
            display: block;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Your Profile</h2>
        <div class="profile-item">
            <label for="P_Name">Name:</label>
            <span>{{ $platinumProfile->P_Name }}</span>
        </div>
        <div class="profile-item">
            <label for="P_IC">IC:</label>
            <span>{{ $platinumProfile->P_IC }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Gender">Gender:</label>
            <span>{{ $platinumProfile->P_Gender }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Religion">Religion:</label>
            <span>{{ $platinumProfile->P_Religion }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Race">Race:</label>
            <span>{{ $platinumProfile->P_Race }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Citizenship">Citizenship:</label>
            <span>{{ $platinumProfile->P_Citizenship }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Address">Address:</label>
            <span>{{ $platinumProfile->P_Address }}</span>
        </div>
        <div class="profile-item">
            <label for="P_PhoneNum">Phone Number:</label>
            <span>{{ $platinumProfile->P_PhoneNum }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Email">Email:</label>
            <span>{{ $platinumProfile->P_Email }}</span>
        </div>
        <div class="profile-item">
            <label for="P_FBName">Facebook Name:</label>
            <span>{{ $platinumProfile->P_FBName }}</span>
        </div>
        <div class="profile-item">
            <label for="P_EduLevel">Education Level:</label>
            <span>{{ $platinumProfile->P_EduLevel }}</span>
        </div>
        <div class="profile-item">
            <label for="P_EduField">Education Field:</label>
            <span>{{ $platinumProfile->P_EduField }}</span>
        </div>
        <div class="profile-item">
            <label for="P_EduInst">Education Institution:</label>
            <span>{{ $platinumProfile->P_EduInst }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Occupation">Occupation:</label>
            <span>{{ $platinumProfile->P_Occupation }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Stud_Sponsor">Study Sponsor:</label>
            <span>{{ $platinumProfile->P_Stud_Sponsor }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Batch">Batch:</label>
            <span>{{ $platinumProfile->P_Batch }}</span>
        </div>
        <div class="profile-item">
            <label for="P_Referral">Referral:</label>
            <span>{{ $platinumProfile->P_Referral }}</span>
        </div>
        <div class="profile-item">
            <label for="P_RefName">Referral Name:</label>
            <span>{{ $platinumProfile->P_RefName }}</span>
        </div>
        <div class="profile-item">
            <label for="P_RefBatch">Referral Batch:</label>
            <span>{{ $platinumProfile->P_RefBatch }}</span>
        </div>
        <div class="profile-item">
            <label for="P_DOApp">Date of Application:</label>
            <span>{{ $platinumProfile->P_DOApp }}</span>
        </div>
    </div>
</body>
</html>
