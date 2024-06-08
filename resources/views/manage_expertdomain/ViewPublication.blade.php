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
        color: #ffffff;
        padding: 10px 20px;
        background-color: #04AA6D;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        font-size: 1.1rem;
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
        align-self: center;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="main-container">
        <div class="center">
            <h4>{{ is_array($expertdomain->E_PublicationTitle) ? implode(', ', $expertdomain->E_PublicationTitle) : $expertdomain->E_PublicationTitle }}</h4>
            <p><strong>Authors:</strong> {{ is_array($expertdomain->E_Authors) ? implode(', ', $expertdomain->E_Authors) : $expertdomain->E_Authors }}</p>
            <p><strong>Publication Date:</strong> {{ is_array($expertdomain->E_PublicationDate) ? implode(', ', $expertdomain->E_PublicationDate) : $expertdomain->E_PublicationDate }}</p>
            <p><strong>Source:</strong> {{ is_array($expertdomain->E_Source) ? implode(', ', $expertdomain->E_Source) : $expertdomain->E_Source }}</p>
            <p><strong>Volume:</strong> {{ is_array($expertdomain->E_Volume) ? implode(', ', $expertdomain->E_Volume) : $expertdomain->E_Volume }}</p>
            <p><strong>Pages:</strong> {{ is_array($expertdomain->E_Pages) ? implode(', ', $expertdomain->E_Pages) : $expertdomain->E_Pages }}</p>
            <p><strong>Publisher:</strong> {{ is_array($expertdomain->E_Publisher) ? implode(', ', $expertdomain->E_Publisher) : $expertdomain->E_Publisher }}</p>

            <button class="link-button" id="link-button">View Publication</button>

            <button class="back-button" onclick="goBack()">Back</button>
        </div>
    </div>

    <script>
        document.getElementById("link-button").addEventListener("click", function() {
            var linkUrl = "{{ is_array($expertdomain->E_Link) ? implode(', ', $expertdomain->E_Link) : $expertdomain->E_Link }}";
            window.open(linkUrl, "_blank");
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

@endsection
