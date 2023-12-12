<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>
<body class="antialiased">

@include('nav-bar')

<div class="container">
    <h1 class="text-center text-4xl font-semibold mt-16">Reservations</h1>

    <table class="table table-striped mt-6">
        <thead>
            <tr>
                <th scope="col">Book Title</th>
                <th scope="col">Book ISBN</th>
                <th scope="col">Member First Name</th>
                <th scope="col">Member Last Name</th>
                <th scope="col">Reservation Date</th>

                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->book_title }}</td>
                    <td>{{ $reservation->book_isbn }}</td>
                    <td>{{ $reservation->member_first_name }}</td>
                    <td>{{ $reservation->member_last_name }}</td>
                    <td>{{ $reservation->reserved_at }}</td>

                    <td>
                        <form action="{{ route('reservations.accept', $reservation->id) }}" method="POST"  >
                            @csrf
                            <button type="submit" class="btn btn-primary ">accept</button>
                        </form>

                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"  >
                            @csrf
                            <button type="submit" class="btn btn-danger ">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
