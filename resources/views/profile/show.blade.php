<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role }}</p>
    @if($user->image)
        <p>Image:</p>
        <img src="{{ asset('storage/images/' . $user->image) }}" alt="{{ $user->name }}" width="100">
    @endif
</body>
</html>