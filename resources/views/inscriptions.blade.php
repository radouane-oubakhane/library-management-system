@include('nav-bar')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Inscriptions</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                       <th scope="col">Fist Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Date of birth</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inscriptions as $inscription)
                                    <tr>
                                        <td>{{ $inscription->first_name }}</td>
                                        <td>{{ $inscription->last_name }}</td>
                                        <td>{{ $inscription->email }}</td>
                                        <td>{{ $inscription->phone }}</td>
                                        <td>{{ $inscription->address }}</td>
                                        <td>{{ $inscription->date_of_birth }}</td>
                                        <td>
                                            <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" style="display: inline-block;">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form action="{{ route('inscriptions.accept', $inscription->id) }}" method="POST" style="display: inline-block;">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
