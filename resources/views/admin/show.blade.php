@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <p>Name: {{ Auth::pengguna()->name }}</p>
    <p>Email: {{ Auth::pengguna()->email }}</p>
    <p>Level:{{ $profile->role }}</p>
    <a href="{{ route('profile.edit') }}">Edit Profile</a>
</div>
@endsection
