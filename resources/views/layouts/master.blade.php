<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Publication</title>

    <!-- CSS and JS  -->
    <link href="{{asset('style.css')}}" rel="stylesheet">
    <script src="{{asset('function.js')}}"></script>

    <!-- Atma Font -->
    <link href='https://fonts.googleapis.com/css?family=Atma' rel='stylesheet'>

    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/449b7d4b66.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <header class="header">
        <div class="sidebar" style="padding-left: 2rem;" onclick="toggleNavSide()"><i class="fa fa-bars"></i></div>
        <div class="system-name">MPScholar</div>
        <div class="profile-icon" style="padding-right: 2rem;" onclick="toggleNavProfile()"><i class="fa fa-user-circle-o"></i></div>
    </header>

    <nav class="side-navigation" id="side-navigation" hidden>
        <div><i class="fa fa-home fa-2x" aria-hidden="true"></i><br><br>Home</div>
        <div><i class="fa fa-id-card-o fa-2x"></i><br><br>Platinum Information</div>
        <div><i class="fas fa-prescription-bottle fa-2x"></i><br><br>Expert</div>
        <div><i class="fa fa-newspaper-o fa-2x" aria-hidden="true"></i><br><br>Publication</div>
        <div><i class="fa fa-phone fa-2x" aria-hidden="true"></i><br><br>Contact Us</div>
    </nav>

    <nav class="profile-navigation" id="profile-navigation" hidden>
        <div>MY PROFILE</div>
        <div>RESEARCH INFORMATION</div>
        <div>SIGN OUT</div>
    </nav>

    <main>
        @yield('content')
    </main>

    


    <footer>
        <div>
            <div class="footer-signature">
                <div class="system-name" style="padding-bottom: 0; padding-top: 0; font-size: 35px;">MPScholar <br></div>
                <div class="signature">
                    <div class ="logo-image-div"><img src="{{asset('JP_Clipboard_Image-removebg-preview.png')}}" id="logo-image"></div>
                    <div class="by-company-text">by Byteblitz Technologies Sdn. Bhd. &copy; 2024</div>
                </div>
            </div>
            <div class="support-company">
                <table>
                    <tr>
                        <th style="width: 200px">Support</th>
                        <th style="width: 200px">Company</th>
                    </tr>
                    <tr>
                        <td class="link"><a href="#help" target="_blank">Help Center</a></td>
                        <td class="link"><a href="#help" target="_blank">About Us</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="link"><a href="#help" target="_blank">News</a></td>
                    </tr>
                </table>
                
            </div>
        </div>



    </footer>
</body>
</html>