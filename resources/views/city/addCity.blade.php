<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New City</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/city" class="back-link">Back</a>
        </nav>
        <h1>Add New City</h1>
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
        @if($msg == 'true')
        <h1 class="error-msg">This city already exists</h1>
        @endif
        <form action='/city' method="post" class="city-form">
            @csrf
            <label for="cityName">City Name:</label>
            <input type='text' id="cityName" name="cityName" value="{{ old('cityName') }}" required />
            <input type='submit' value='Create' class="submit-button" />
        </form>
    </main>
</body>
</html>
