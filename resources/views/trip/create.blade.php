<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Trip</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('index') }}" class="home-link">Home</a>
        </nav>
        <h1>Create New Trip</h1>
    </header>
    <main>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($buses->count() > 0 && $cities->count() > 1)  
            <form action="/trip" method="post" class="trip-form">
                @csrf
                <label for="busNumber">Bus Number:</label>
                <select name="busNumber" id="busNumber" required>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->numberOfBus }}</option>
                    @endforeach
                </select>
                
                <label for="to">To:</label>
                <select name="to" id="to" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                
                <label for="from">From:</label>
                <select name="from" id="from" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                
                <label for="totalPrice">Total Price:</label>
                <input type="text" name="totalPrice" id="totalPrice" required value="{{ old('totalPrice') }}" />
                
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required />
                
                <input type="submit" value="Create" class="submit-button"/>
            </form>
        @else
            <form action="/trip" method="post" class="trip-form">
                @csrf
                <label for="busNumber">Bus Number:</label>
                <select name="busNumber" id="busNumber" required>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->numberOfBus }}</option>
                    @endforeach
                </select>
                
                <label for="to">To:</label>
                <select name="to" id="to" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                
                <label for="from">From:</label>
                <select name="from" id="from" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                
                <label for="totalPrice">Total Price:</label>
                <input type="text" name="totalPrice" id="totalPrice" required value="{{ old('totalPrice') }}" />
                
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required />
                
                <input type="submit" value="Create" class="submit-button"/>
            </form>
        @endif
    </main>
</body>
</html>
