
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>auteurs</title>
</head>
<body>
<div>
    <h1>Authors</h1>
    <table class="table ">
        <thead>
        <tr>
            <th  scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($auteurs as $auteur)
            <tr>
                <td>{{ $auteur->first_name }}</td>
                <td>{{ $auteur->last_name }}</td>
                <td>{{ $auteur->email }}</td>
                <td>{{ $auteur->phone }}</td>

                <td>{{ $auteur->date_of_birth }}</td>
               <td><a href="{{ route('authors.edit', $auteur->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                   </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
