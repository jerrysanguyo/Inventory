@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Account Profile</span>
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.account.profile.edit') }}" method="POST">
        @else
        <a href="{{ route('user.dashboard') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('user.account.profile.edit') }}" method="POST">
    @endif
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        @if( Auth::user()->role==='admin')
                        <option value="admin">Admin</option>
                        @else
                        <option value="user">User</option>
                        @endif
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
