<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Cities</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('index') }}" class="home-link">Home</a>
        </nav>
        <h1>View Cities</h1>
    </header>
    <main>
        <a href="/city/create?msg=false" class="add-city-link">Add New City</a>
        @if($allCities->count() == 0)
            <h1 class="no-cities-msg">No city found</h1>
        @else
            <div class="city-container">
                @foreach ($allCities as $city)
                    <div class="city-card">
                        <h3 class="city-name">{{ $loop->index + 1 }}- {{ $city->name }}</h3>
                        <div class="city-actions">
                            <a href="/city/{{ $city->id }}?msg=false" class="update-city-link">Update</a>
                            <form action="/city/{{ $city->id }}" method="post" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="delete-button" />
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>
