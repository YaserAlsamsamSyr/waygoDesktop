<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trip Customers</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a class="back-link" href="/trip?isAvilable={{ $msg }}">Back</a>
            @if($msg == 'yes')
                <a class="add-link" href="/customer/openAddCustomer/{{ $trip->id }}?isCreated=false">Add New Customers</a>
            @endif
        </nav>
    </header>
    <main>
        @if(count($trip->customers) > 0)
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>ISS</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trip->customers as $cus)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $cus->firstName }}</td>
                            <td>{{ $cus->lastName }}</td>
                            <td>{{ $cus->fatherName }}</td>
                            <td>{{ $cus->motherName }}</td>
                            <td>{{ $cus->phoneNumber }}</td>
                            <td>{{ $cus->gender }}</td>
                            <td>{{ $cus->iss }}</td>
                            <td>
                                <form action="/customer/deleteCustomer/{{ $cus->id }}/{{ $trip->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="delete-button"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1 class="no-customers">No customers in this trip</h1>
        @endif
    </main>
</body>
</html>
