<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Bus</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @if($msg=='true')
        <h1 class="error-message">This bus number already exists</h1>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif
    
    <a href='/bus' class="back-link">Back</a>
    
    <form action='/bus' method="post" class="bus-form">
        @csrf
        <label for="type">Type of Bus:</label>
        <input type="text" name="type" id="type" value="{{ old('type') }}" required />
        
        <label for="numberOfSeats">Number of Seats:</label>
        <input type="number" name="numberOfSeats" id="numberOfSeats" value="{{ old('numberOfSeats') }}" required />
        
        <label for="numberOfBus">Number of Bus:</label>
        <input type="text" name="numberOfBus" id="numberOfBus" value="{{ old('numberOfBus') }}" required />
        
        <label for="driverName">Driver Name:</label>
        <input type="text" name="driverName" id="driverName" value="{{ old('driverName') }}" required />
        
        <label for="helpDriverName">Helper Driver Name:</label>
        <input type="text" name="helpDriverName" id="helpDriverName" value="{{ old('helpDriverName') }}" required />
        
        <input type="submit" value='Create' class="submit-button" />
    </form>
</body>
</html>
