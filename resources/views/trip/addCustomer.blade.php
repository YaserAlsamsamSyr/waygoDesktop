<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="back-link" href="/trip/{{ $tripId }}?isAvilable=yes">Back</a>
        </nav>
    </header>
    <main>
        @if($isCreated == 'true')
            <h1 class="success-message">Customer was created successfully</h1>
        @elseif ($isCreated == 'full')
            <h1 class="error-message">Can't add a new customer, this trip is full</h1>
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
        
        <form action="{{ route('createCustomer') }}" method="post" class="customer-form">
            @csrf
            <input type="hidden" name="tripId" value="{{ $tripId }}" />
            
            <label for="fName">First Name:</label>
            <input type="text" id="fName" name="fName" value="{{ old('fName') }}" required />
            
            <label for="lName">Last Name:</label>
            <input type="text" id="lName" name="lName" value="{{ old('lName') }}" required />
            
            <label for="faName">Father Name:</label>
            <input type="text" id="faName" name="faName" value="{{ old('faName') }}" required />
            
            <label for="mName">Mother Name:</label>
            <input type="text" id="mName" name="mName" value="{{ old('mName') }}" required />
            
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" required />
            
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="{{ old('gender') }}" required />
            
            <label for="iss">ISS:</label>
            <input type="text" id="iss" name="iss" value="{{ old('iss') }}" required />
            
            <input type="submit" value="Reserve" class="submit-button"/>
        </form>
    </main>
</body>
</html>
