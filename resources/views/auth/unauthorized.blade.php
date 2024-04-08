@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="row text-center">
                    <span class="fs-1">Unauthorized Access</span>
                    <span class="fs-5 mb-3 text-body-secondary">You do not have an access to this page. Kindly contact your Admin.</span>
                    <button class="btn btn-primary">Back to Homepage</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
