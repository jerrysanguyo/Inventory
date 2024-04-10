@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Inventory / Details</span>
        <a href="{{ route('admin.inventory.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card justify-content-center mb-3" style="min-height:533px">
                <div class="card-body">
                    <div class="mb-3">
                        <span class="fs-4">Item Details:</span>
                    </div>
                    <div class="row">
                        <label for="issued_to" class="col-sm-4 col-form-label">Issued to:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="issued_to" value="{{ $inventory->assigned_to ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="department" class="col-sm-4 col-form-label">Department:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="department" value="{{ $inventory->departmentName->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="eqn" class="col-sm-4 col-form-label">Equipment name:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="eqn" value="{{ $inventory->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="eqt" class="col-sm-4 col-form-label">Equipment type:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="eqt" value="{{ $inventory->equipmentName->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="sn" class="col-sm-4 col-form-label">Serial number:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="sn" value="{{ $inventory->serial_number }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="qt" class="col-sm-4 col-form-label">Quantity:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="qt" value="{{ $inventory->quantity }} - {{ $inventory->unitName->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="ib" class="col-sm-4 col-form-label">Issued by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="ib" value="{{ $inventory->issuedName->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="dp" class="col-sm-4 col-form-label">Deploy by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="dp" value="{{ $inventory->deployName->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="rb" class="col-sm-4 col-form-label">Received by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="rb" value="{{ $inventory->received_by ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="dt" class="col-sm-4 col-form-label">Date deployed:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="dt" value="{{ $inventory->deploy_date ?? 'N/A' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <span class="fs-4">Assign to</span>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="at" class="form-label">Assign to:</label>
                                        <input type="text" name="assigned_to" id="at" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dpt" class="form-label">Department:</label>
                                        <input type="text" name="department_id" id="dpt" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="issby" class="form-label">Issued by:</label>
                                        <input type="text" name="issued_by" id="issby" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dpby" class="form-label">Deploy by:</label>
                                        <input type="text" name="deploy_by" id="dpby" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="rcby" class="form-label">Received by:</label>
                                        <input type="text" name="received_by" id="rcby" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dtd" class="form-label">Date deployed:</label>
                                        <input type="date" name="date_deployed" id="dtd" class="form-control">
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <span class="fs-4">Return</span>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="at" class="form-label">Return by:</label>
                                        <input type="text" name="assigned_to" id="at" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rcby" class="form-label">Received by:</label>
                                        <input type="text" name="received_by" id="rcby" class="form-control">
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card justify-content-center mt-3">
        <div class="card-body">
            <span class="fs-3">Delete this Item</span>
            <hr>
            Deleting an item will be pemanently erase. I highly suggest to consult other before proceeding to deletion.
            <form action="{{ route('admin.inventory.destroy', $inventory->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" onclick="return confirm('Are you sure you want to delete this Item?');" value="Delete" class="btn btn-danger mt-3">
            </form>
        </div>
    </div>
</div>
@endsection
