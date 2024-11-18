<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bus Trips</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="nav-link" href="{{ route('index') }}">Home</a>
            <a class="nav-link" href="/bus">Back</a>
        </nav>
    </header>
    <main>
        <h1>Bus Trips</h1>
        <div class="bus-trips">
            @foreach ($busTrips as $trip)
                <div class="trip">
                    <p><strong>Date:</strong> {{ $trip->date }}</p>
                    <p><strong>Ticket Price:</strong> {{ $trip->ticketPrice }}</p>
                    <p><strong>From (User ID):</strong> {{ $trip->user_id }}</p>
                    <p><strong>To (Bus ID):</strong> {{ $trip->bus_id }}</p>
                </div>
                <hr>
            @endforeach
        </div>
    </main>
</body>
</html>
