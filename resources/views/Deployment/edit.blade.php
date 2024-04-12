@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Deployment / Deployment Edit</span>
        <a href="{{ route('admin.deployment.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{route('admin.deployment.update', ['deployment' => $deployment->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="at" class="form-label">Assigned to:</label>
                        <input type="text" name="assigned_to" id="at" class="form-control" value="{{ $deployment->assigned_to }}">
                        <input type="text" name="inventory_id" id="at" class="form-control" value="{{ $deployment->inventory_id }}" hidden>
                    </div>
                    <div class="col-md-6">
                        <label for="dp" class="form-label">Department</label>
                        <select name="department_id" id="dp" class="form-select">
                            <option value="{{ $deployment->department_id }}">{{ $deployment->departmentName->name }}</option>
                            @foreach($listOfDepartment as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="ib" class="form-label">Issued by:</label>
                        <select name="issued_by" id="ib" class="form-select">
                            <option value="{{ $deployment->issued_by }}">{{ $deployment->issuedName->name }}</option>
                            @foreach ($listOfUser as $User)
                                <option value="{{ $User->id }}">{{ $User->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="db" class="form-label">Deploy by:</label>
                        <select name="deploy_by" id="db" class="form-select">
                            <option value="{{ $deployment->deploy_by }}">{{ $deployment->deployName->name }}</option>
                            @foreach($listOfUser as $User)
                                <option value="{{ $User->id }}">{{ $User->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="rb" class="form-label">Received by:</label>
                        <input type="text" name="received_by" id="rb" class="form-control" value="{{ $deployment->received_by }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="dd" class="form-label">Deployment date:</label>
                        <input type="date" name="deploy_date" id="dd" class="form-control" value="{{ $deployment->deploy_date }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ss" class="form-label">Status:</label>
                        <select name="status" id="ss" class="form-select">
                            <option value="{{ $deployment->status }}">{{ $deployment->status }}</option>
                            <option value="Borrowed">Borrowed</option>
                            <option value="Return">Return</option>
                            <option value="In Stock">In Stock</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
