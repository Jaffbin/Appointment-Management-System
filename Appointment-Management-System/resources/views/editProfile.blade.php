@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="w-50">
        <h2 class="text-center">Edit Profile</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $user->birthdate }}" required>
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ $user->phonenumber }}" required>
            </div>
            <div class="form-group">
                <label for="job">Job</label>
                <input type="text" class="form-control" id="job" name="job" value="{{ $user->job }}" required>
            </div>
            <div class="form-group">
                <label for="organization">Organization</label>
                <input type="text" class="form-control" id="organization" name="organization" value="{{ $user->organization }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
            <br>
        </form>
    </div>
</div>
@endsection