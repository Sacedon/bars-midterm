<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to custom CSS stylesheet -->
    <title>Demo</title>
    <style>
        /* Your custom CSS styles go here */
        body {
            background-color: #f0f0f0;
        }

        .navbar {
            background-color: #007bff; /* Change the navbar background color */
        }

        .navbar-brand {
            color: #fff; /* Change the navbar brand text color */
            font-weight: bold;
        }

        /* Add more custom styles as needed */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-center"> <!-- Added justify-content-center class -->
            <a class="navbar-brand" href="{{ route('animals.index') }}">
                @if(auth()->check()) {{ auth()->user()->name }} @else Midterm @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- Align content to the right -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animals.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('animal-logs') }}">Logs</a>
                    </li>
                    @if(auth()->check())
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ ('/') }}">Login</a>
                    </li>
                    @endif
                    <!-- Add more navigation links as needed -->
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-ZuRj2SNF9wO5KCx4/LbTP0KwlGcsmJp+5D0P5B7utW9jT8t5n5PVCOb7z5O5OZ5q6W" crossorigin="anonymous"></script>
</body>
</html>
