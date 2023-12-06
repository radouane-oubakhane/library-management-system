<html>
<head>
    <title>Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div>
    <h1>Members</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Membership Start Date</th>
                <th>Membership End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->last_name }}</td>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->address }}</td>
                    <td>{{ $member->date_of_birth }}</td>
                    <td>{{ $member->membership_start_date }}</td>
                    <td>{{ $member->membership_end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
