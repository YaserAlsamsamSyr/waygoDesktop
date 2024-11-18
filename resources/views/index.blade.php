<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transportation Company</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <a href="{{ route('profile.edit') }}">Profile</a>
        </nav>
        <h1><big>{{ $companyName }}</big>: Company for Transportation</h1>
    </header>
    <main>
        <section class="links">
            <a href='/trip/create' class="button">Add New Trip</a>
            <a href='/bus' class="button">View Buses</a>
            <a href='/city' class="button">View Cities</a>
            <a href='/trip?isAvilable=yes' class="button">View Available Trips</a>
            <a href='/trip?isAvilable=no' class="button">View Ended Trips</a>
        </section>
    </main>
</body>
</html>
