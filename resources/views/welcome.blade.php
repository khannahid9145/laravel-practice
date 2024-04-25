<!doctype html>

<head>
    <title>Welcome Page </title>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <div class="center">
        <h1>First page </h1>

        <div class="page1">
            <nav>
                <ul>
                    <li><a href="/form">Registration Page</a></li>
                    <li><a href="/layout1">Layout Page</a></li>
                    <li><a href="/layoutDesign">Design Layout Page</a></li>
                    <li><a href="{{ route('alldata') }}">Page Control alldata</a></li>
                    <li><a href="{{ route('home') }}">Page Control</a></li>
                    {{-- <li><a href="{{ route('adduser') }}">ADD User Data</a></li> --}}
                    {{-- <li><a href="/alldata">Page Control alldata</a></li> --}}
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>
