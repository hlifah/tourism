<!-- resources/views/auth/passwords/change.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>

<h2>Change Password</h2>

@if(session('status'))
    <div style="color: green;">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('password.change') }}" method="POST">
    @csrf

    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" required>
    <br><br>

    <label for="new_password">New Password</label>
    <input type="password" name="new_password" required>
    <br><br>

    <label for="new_password_confirmation">Confirm New Password</label>
    <input type="password" name="new_password_confirmation" required>
    <br><br>

    <button type="submit">Change Password</button>
</form>

</body>
</html>
