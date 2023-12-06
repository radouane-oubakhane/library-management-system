<div>
    <h1>Auteur </h1>
    <table>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of birth</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($auteurs as $auteur)
            <tr>
                <td>{{ $auteur->first_name }}</td>
                <td>{{ $auteur->last_name }}</td>
                <td>{{ $auteur->email }}</td>
                <td>{{ $auteur->phone }}</td>
                <td>{{ $auteur->address }}</td>
                <td>{{ $auteur->date_of_birth }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
