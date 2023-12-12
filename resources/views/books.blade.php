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
<div>
    <h1>Books</h1>

    <a class="btn btn-primary" href="{{route('books.create')}}">Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author Fist Name</th>
                <th>Author Last Name</th>
                <th>Category</th>
                <th>ISBN</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Publisher</th>
                <th>Published Date</th>
                <th>Language</th>
                <th>Edition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author_first_name }}</td>
                    <td>{{ $book->author_last_name }}</td>
                    <td>{{ $book->category_name }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->published_at }}</td>
                    <td>{{ $book->language }}</td>
                    <td>{{ $book->edition }}</td>
                    <td>

                            <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
