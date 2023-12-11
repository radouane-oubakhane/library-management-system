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

<h1>Borrows</h1>

<table class="table table-striped mt-6">
    <thead>
    <tr>
        <th scope="col">Book title</th>
        <th scope="col">Book ISBN</th>
        <th scope="col">Copy ID</th>
        <th scope="col">Member First Name</th>
        <th scope="col">Member Last Name</th>
        <th scope="col">Borrowed at</th>
        <th scope="col">Returned at</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($borrows as $borrow)
        <tr>
            <td>{{ $borrow->book->title }}</td>
            <td>{{ $borrow->book->isbn }}</td>
            <td>{{ $borrow->book_copy_id }}</td>
            <td>{{ $borrow->member->first_name }}</td>
            <td>{{ $borrow->member->last_name }}</td>
            <td>{{ $borrow->borrow_date }}</td>
            <td>{{ $borrow->return_date }}</td>
            <td>{{ $borrow->status }}</td>
            <td>
                @if($borrow->status == 'borrowed')
                    <form action="{{ route('borrows.return', $borrow->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success">Return</button>
                    </form>

                    <form action="{{ route('borrows.overdue', $borrow->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger">Overdue</button>
                    </form>
                @endif
                @if($borrow->status == 'overdue')
                    <form action="{{ route('borrows.return', $borrow->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success">Return</button>
                    </form>

                @endif
                <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-danger">Delete</button>
                </form>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
