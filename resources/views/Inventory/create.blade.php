@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Inventory / Inventory Create</span>
        <a href="{{ route('admin.inventory.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.inventory.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-4">
                        <label for="dpname" class="form-label">Item name:</label>
                        <input type="text" name="name" id="dpname" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="eqt" class="form-label">Equipment Type</label>
                        <select name="equipment_id" id="eqt" class="form-select">
                            @foreach ($listOfEquipment as $equipment)
                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sernum" class="form-label">Serial Number</label>
                        <input type="text" name="serial_number" id="sernum" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="qty" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select name="unit_id" id="unit" class="form-select">
                            @foreach ($listOfUnit as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="dept" class="form-label">Department</label>
                        <select name="department_id" id="dept" class="form-select">
                            @foreach ($listOfDepartment as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="issuby" class="form-label">Issued by</label>
                        <select name="issued_by" id="issuby" class="form-select">
                            @foreach ($listOfUser as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="user" class="form-label">Issued to</label>
                        <input type="text" name="assigned_to" id="user" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="recby" class="form-label">Received by</label>
                        <input type="text" name="received_by" id="recby" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="dep" class="form-label">Deployed by</label>
                        <select name="deploy_by" id="dep" class="form-select">
                            @foreach ($listOfUser as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dissu" class="form-label">Date Deployed</label>
                        <input type="date" name="deploy_date" id="dissu" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" name="remark" id="remarks" class="form-control">
                    </div>
                    <div class="col-md-12 d-flex justify-content-end mt-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
