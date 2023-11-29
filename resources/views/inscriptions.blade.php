<div>
    <h1>Inscriptions</h1>
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
            @foreach ($inscriptions as $inscription)
                <tr>
                    <td>{{ $inscription->first_name }}</td>
                    <td>{{ $inscription->last_name }}</td>
                    <td>{{ $inscription->email }}</td>
                    <td>{{ $inscription->phone }}</td>
                    <td>{{ $inscription->address }}</td>
                    <td>{{ $inscription->date_of_birth }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
