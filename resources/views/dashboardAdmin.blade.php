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
<div>
    <!-- resources/views/dashboard.blade.php -->




        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tableau de bord</h3>
                    <hr>

                    <div class="list-group">
                        <a href="{{ route('inscriptions.index') }}" class="list-group-item list-group-item-action">Liste des inscriptions</a>
                        <a href="{{ route('books.index') }}" class="list-group-item list-group-item-action">Liste des livres</a>
                        <a href="{{ route('authors.index') }}" class="list-group-item list-group-item-action">Liste des auteurs</a>
                        <a href="{{ route('reservations.index') }}" class="list-group-item list-group-item-action">Liste des réservations</a>
                        <a href="{{ route('borrows.index') }}" class="list-group-item list-group-item-action">Liste des emprunts</a>
                        <a href="{{ route('book-categories.index') }}" class="list-group-item list-group-item-action">Liste des categories</a>
                        <a href="{{ route('book-copies.index') }}" class="list-group-item list-group-item-action">Liste des copies</a>

                    </div>
                </div>
            </div>
        </div>


</div>
</body>
</html>
