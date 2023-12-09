

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
    <div>
    <h1>Members</h1>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Email</th>
                <th scope="col">Membership Start Date</th>
                <th scope="col">Membership End Date</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr >
                    <td scope="row">{{ $member->last_name }}</td>
                    <td>{{ $member->first_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->membership_start_date }}</td>
                    <td>{{ $member->membership_end_date }}</td>
                    <td><a href="{{ route('members.edit', $member->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

