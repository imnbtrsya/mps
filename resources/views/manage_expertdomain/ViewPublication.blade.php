@extends('layouts/masterPlatinum')

@section('content')

<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }

    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .center {
        flex-direction: column;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 40px;
        max-width: 1000px; /* Adjust the max-width here */
        align-items: center;
    }

    h4 {
        color: #333333;
        margin-top: 20px;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    p {
        color: #666666;
        margin: 10px 0;
        font-size: 1.1rem;
    }

    .link-button {
        margin-top: 20px;
        width: 200px;
        padding: 10px 20px;
        font-size: 1.1rem;
        color: #ffffff;
        background-color: #04AA6D;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        align-self: center;
    }

    .link-button:hover {
        background-color: #218c65;
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
        align-self: left;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="center">
        <h4>{{ $expertdomain->E_PublicationTitle[$publication] }}</h4>
        <p><strong>Authors:</strong> {{ $expertdomain->E_Authors[$publication] }}</p>
        <p><strong>Publication Date:</strong> {{ $expertdomain->E_PublicationDate[$publication] }}</p>
        <p><strong>Source:</strong> {{ $expertdomain->E_Source[$publication] }}</p>
        <p><strong>Volume:</strong> {{ $expertdomain->E_Volume[$publication] }}</p>
        <p><strong>Pages:</strong> {{ $expertdomain->E_Pages[$publication] }}</p>
        <p><strong>Publisher:</strong> {{ $expertdomain->E_Publisher[$publication]  }}</p>
        <a href="{{ $expertdomain->E_Link[$publication]  }}" target="_blank">
            <button class="link-button">View Publication</button>
        </a>

            <button class="link-button" id="link-button">View Publication</button>

            <button class="back-button" onclick="goBack()">Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

@endsection
