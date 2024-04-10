@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Inventory / Inventory Edit</span>
        <a href="{{ route('admin.inventory.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.inventory.update', ['inventory' => $inventory->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="dpname" class="form-label">Item name:</label>
                        <input type="text" name="name" id="dpname" class="form-control" value="{{ $inventory->name }}">
                    </div>
                    <div class="col-md-6">
                        <label for="eqt" class="form-label">Equipment Type</label>
                        <select name="equipment_id" id="eqt" class="form-select">
                            <option value="{{ $inventory->equipment_id }}">{{ $inventory->equipmentName->name }}</option>
                            @foreach ($listOfEquipment as $equipment)
                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="sernum" class="form-label">Serial Number</label>
                        <input type="text" name="serial_number" id="sernum" class="form-control" value="{{ $inventory->serial_number }}">
                    </div>
                    <div class="col-md-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="qty" class="form-control" value="{{ $inventory->quantity }}">
                    </div>
                    <div class="col-md-3">
                        <label for="unit" class="form-label">Unit</label>
                        <select name="unit_id" id="unit" class="form-select">
                            @foreach ($listOfUnit as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" name="remark" id="remarks" class="form-control" value="{{ $inventory->remark }}">
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
