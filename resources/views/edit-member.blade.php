<div>
    <h1>Edit Book</h1>
    <form action="/members/{{ $member->id }}/edit" method="POST">
        @csrf
        <div>
            <label for="name">First Name</label>
            <input type="text" name="name" value="{{ $member->first_name }}">
        </div>
        <div>
            <label for="name">Last Name</label>
            <input type="text" name="name" value="{{ $member->last_name }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $member->email }}">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ $member->phone }}">
        </div>
        <div>
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ $member->address }}">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" name="password" value="{{ $member->password }}">
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="text" name="password_confirmation" value="{{ $member->password_confirmation }}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
</div>
