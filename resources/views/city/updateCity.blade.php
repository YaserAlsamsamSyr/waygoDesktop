<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update City</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/city" class="back-link">Back</a>
        </nav>
        <h1>Update City</h1>
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
        @if($msg=='true')
        <h1 class="error-msg">This city already exists</h1>
        @endif
        <form action="{{ route('updateCity') }}" method="post" class="city-form">
            @csrf
            <input type="hidden" name="cityId" value="{{ $cityId }}" />
            <label for="cityName">City Name:</label>
            <input type="text" id="cityName" name="cityName" value="{{ $cityName }}" required />
            <input type="submit" value="Update" class="submit-button" />
        </form>
    </main>
</body>
</html>
