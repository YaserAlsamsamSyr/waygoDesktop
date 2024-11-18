<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Available Trips</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="home-link" href="{{ route('index') }}">Home</a>
        </nav>
    </header>
    <main>
        <h1>Trips</h1>
        <div class="trips">
            @foreach ($allTrips as $trip)
                <div class="trip-card">
                    <div class="trip-info">
                        <p><strong>Date:</strong> {{ $trip->date }}</p>
                        <p><strong>Ticket Price:</strong> {{ $trip->ticketPrice }}</p>
                        <p><strong>Number of Seats:</strong> {{ $trip->bus->numOfSeats }}</p>
                        <p><strong>Available Seats:</strong> {{ $trip->availabelSeats }}</p>
                    </div>
                    <div class="trip-actions">
                        <form action="/trip/{{ $trip->id }}?isAvilable={{ $isAvilable }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="delete-button" value="Delete" />
                        </form>
                        <a class="show-customers-link" href="/trip/{{ $trip->id }}?isAvilable={{ $isAvilable }}">Show Customers</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
