@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="row text-center">
                    <span class="fs-1">Unauthorized Access</span>
                    <span class="fs-5 mb-3 text-body-secondary">You do not have an access to this page. Kindly contact your Admin.</span>
                    @if (auth()->user()->role === "admin")
                    <a href="{{ route('admin.dashboard') }}">
                        <button class="btn btn-primary">Back to Homepage</button>
                    </a>
                    @else 
                    <a href="{{ route('user.dashboard') }}">
                        <button class="btn btn-primary">Back to Homepage</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
