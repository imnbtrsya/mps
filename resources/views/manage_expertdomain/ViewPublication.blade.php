@extends('layouts/masterPlatinum')
@section('content')

<style>
    .center {
        display: flex;
        align-items: center;
        height: 100vh;
        flex-direction: column;
        text-align: center;
    }

    .link {
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }

    header h4 {
        	margin-top: 20px;
    }

</style>

<body>
    <div class="center">
        <h4>{{ $expertdomain->E_Title }}</h4>
        <p>Authors: {{ $expertdomain->E_Authors }}</p>
        <p>Publication Date: {{ $expertdomain->E_PublicationDate }}</p>
        <p>Source: {{ $expertdomain->E_Source }}</p>
        <p>Volume: {{ $expertdomain->E_Volume }}</p>
        <p>Pages: {{ $expertdomain->E_Pages }}</p>
        <p>Publisher: {{ $expertdomain->E_Publisher }}</p>
        
        <p class="link" id="link">{{ $expertdomain->E_Title }}</p>
    </div>

    <script>
        document.getElementById("link").addEventListener("click", function() {
            var linkUrl = "{{ $expertdomain->E_Link }}";
            window.open(linkUrl, "_blank");
        });
    </script>
</body>
</html>


@endsection