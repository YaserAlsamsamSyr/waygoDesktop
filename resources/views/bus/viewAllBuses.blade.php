<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Buses</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('index') }}" class="home-link">Home</a>
        </nav>
        <h1>View All Buses</h1>
    </header>
    <main>
        @if($allBuses->count() == 0)
        
            <a href='/bus/create' class="button">Add New Bus</a>
            <h1 class="no-buses-msg">No buses</h1>
        @else
            <div class="bus-container">
                @foreach ($allBuses as $bus)
                    <div class="bus-card">
                        <p class="bus-info">Number of Bus: {{ $bus->numberOfBus }}</p>
                        <p class="bus-info">Driver Name: {{ $bus->driverName }}</p>
                        <p class="bus-info">Helper Driver Name: {{ $bus->helpDriverName }}</p>
                        <p class="bus-info">Number of Seats: {{ $bus->numOfSeats }}</p>
                        <p class="bus-info">Type: {{ $bus->type }}</p>
                        
                        <div class="bus-actions">
                            <form action="/bus/{{ $bus->id }}" method="post" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="delete-button" />
                            </form>
                            <a href="/bus/{{ $bus->id }}/edit" class="update-bus-link">Update</a>
                            <a href="/bus/{{ $bus->id }}" class="bus-trips-link">Trips</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{ $allBuses->links() }}
        @endif
    </main>
</body>
</html>
