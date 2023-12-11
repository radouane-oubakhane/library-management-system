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


    <!-- Styles -->

</head>
<body class="antialiased">

@include('nav-bar')

    <h1>Réservations</h1>
    <div class="container">
        <a class="btn btn-primary" href="/reservations/reservableBooks">Ajouter un reservation</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre du livre</th>
                <th>ISBN du livre</th>

                <th>Réservé le</th>
                <th>Annulé le</th>
                <th>Expire le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->book_title }}</td>
                    <td>{{ $reservation->book_isbn }}</td>

                    <td>{{ $reservation->reserved_at }}</td>
                    <td>{{ $reservation->canceled_at }}</td>
                    <td>{{ $reservation->expired_at }}</td>
                    <td>

                        <form action="{{ route('reservations.member.destroy', $reservation->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
