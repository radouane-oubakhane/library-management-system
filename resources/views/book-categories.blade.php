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
    <h1>Les catégories</h1>
    <a class="btn btn-primary" href="{{route('book-categories.create')}}">Ajouter</a>

    <ul>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookCategories as $bookCategory)
                <tr>
                    <td>{{$bookCategory->name}}</td>
                    <td>
                        <a  class="btn btn-primary" href="/book-categories/{{$bookCategory->id}}/edit">Edit</a>
                        <form action="/book-categories/{{$bookCategory->id}}/delete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>

</div>

</body>
</html>
