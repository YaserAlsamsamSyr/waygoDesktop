<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bus</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="home-link" href="{{ route('index') }}">Home</a>
        </nav>
    </header>
    <main>
        <h1>Edit Bus</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('updateBus') }}" method="post" class="bus-form">
            @csrf
            <input type="hidden" name="type" value="{{ $bus->type }}" />
            <input type="hidden" name="numberOfSeats" value="{{ $bus->numOfSeats }}" />
            <input type="hidden" name="busId" value="{{ $bus->id }}" required />
            <div class="form-group">
                <label for="numberOfBus">Number of Bus:</label>
                <input type="text" id="numberOfBus" name="numberOfBus" value="{{ $bus->numberOfBus }}" required />
            </div>
            <div class="form-group">
                <label for="driverName">Driver Name:</label>
                <input type="text" id="driverName" name="driverName" value="{{ $bus->driverName }}" required />
            </div>
            <div class="form-group">
                <label for="helpDriverName">Help Driver Name:</label>
                <input type="text" id="helpDriverName" name="helpDriverName" value="{{ $bus->helpDriverName }}" required />
            </div>
            <input type="submit" class="submit-button" value="Update" />
        </form>
    </main>
</body>
</html>
