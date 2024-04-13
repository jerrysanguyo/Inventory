@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <span class="fs-3">Inventory / Details</span>
        <a href="{{ route('admin.inventory.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <!-- item details -->
            <div class="card justify-content-center mb-3" style="min-height:533px">
                <div class="card-body">
                    <div class="mb-3">
                        <span class="fs-4">Item Details:</span>
                    </div>
                    <div class="row">
                        <label for="assigned_to" class="col-sm-4 col-form-label">Issued to:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="assigned_to" value="{{ $inventory->latestDeployment->assigned_to ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="department" class="col-sm-4 col-form-label">Department:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="department" value="{{ $inventory->latestDeployment->departmentName->name ?? 'N/A' }}">
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
                            <input type="text" readonly class="form-control-plaintext" id="ib" value="{{ $inventory->latestDeployment->issuedName->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="dp" class="col-sm-4 col-form-label">Deploy by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="dp" value="{{ $inventory->latestDeployment->deployName->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="rb" class="col-sm-4 col-form-label">Received by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="rb" value="{{ $inventory->latestDeployment->received_by ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="dt" class="col-sm-4 col-form-label">Date deployed:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="dt" value="{{ $inventory->latestDeployment->deploy_date ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="reb" class="col-sm-4 col-form-label">Return by:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="reb" value="{{ $inventory->latestDeployment->return_by ?? 'Not returned yet' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="red" class="col-sm-4 col-form-label">Return date:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="red" value="{{ $inventory->latestDeployment->return_by ?? 'Not returned yet' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="rebr" class="col-sm-4 col-form-label">Received by: (return)</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="rebr" value="{{ $inventory->latestDeployment->receivedName->name ?? 'Not returned yet' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="sts" class="col-sm-4 col-form-label">Status:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="sts" value="{{ $inventory->latestDeployment->status ?? 'In Stock' }}">
                        </div>
                    </div>
                    <span class="fs-4">Additional Info</span>
                    <div class="row">
                        <label for="pkos" class="col-sm-4 col-form-label">Product key OS:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="pkos" value="{{ $inventory->pk_os ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="pkms" class="col-sm-4 col-form-label">Product key MS:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="pkms" value="{{ $inventory->pk_ms_office ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="em" class="col-sm-4 col-form-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="em" value="{{ $inventory->email ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pw" class="col-sm-4 col-form-label">Password:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="pw" value="{{ $inventory->password ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($hasDeployment)
                                <!-- if has deployment -->
                                <div class="d-grid gap-2 mb-3">
                                    <a href="{{ route('admin.deployment.edit', ['deployment' => $inventory->latestDeployment->id]) }}" class="btn btn-primary" type="button">Edit Borrower</a>
                                </div>
                                @else

                            @endif
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
                            @if(!$hasDeployment)
                                <!-- if no deployment -->
                                <!-- assign form -->
                                <span class="fs-4">Assign to</span>
                                <form action="{{ route('admin.deployment.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="text" name="inventory" id="inv" class="form-control" value="{{ $inventory->id }}" hidden>
                                    <div class="row">
                                        <div class="col-md-12" hidden>
                                            <label for="ii" class="form-label">Inventory Id:</label>
                                            <input type="text" name="inventory_id" id="ii" class="form-control" value="{{ $inventory->id }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="at" class="form-label">Assign to:</label>
                                            <input type="text" name="assigned_to" id="at" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dept" class="form-label">Department</label>
                                            <select name="department_id" id="dept" class="form-select">
                                                @foreach ($listOfDepartment as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="issuby" class="form-label">Issued by</label>
                                            <select name="issued_by" id="issuby" class="form-select">
                                                @foreach ($listOfUser as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dep" class="form-label">Deployed by</label>
                                            <select name="deploy_by" id="dep" class="form-select">
                                                @foreach ($listOfUser as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="rcby" class="form-label">Received by:</label>
                                            <input type="text" name="received_by" id="rcby" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dtd" class="form-label">Date deployed:</label>
                                            <input type="date" name="deploy_date" id="dtd" class="form-control">
                                        </div>
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-primary mt-3">
                                </form>
                            @else
                            <!-- return form -->
                            <span class="fs-4">Return:</span>
                            <form action="{{ route('admin.deployment.depReturn', ['deployment' => $inventory->latestDeployment->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <input type="text" name="inventory" id="inv" class="form-control" value="{{ $inventory->id }}" hidden>
                                <div class="col-md-12">
                                    <label for="retB" class="form-label">Return by:</label>
                                    <input type="text" name="return_by" id="retB" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="retD" class="form-label">Return date:</label>
                                    <input type="date" name="return_date" id="retD" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="recB" class="form-label">Received by:</label>
                                    <select name="received_by_return" id="recB" class="form-select">
                                        @foreach ($listOfUser as $User)
                                        <option value="{{ $User->id }}">{{ $User->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Return" class="btn btn-primary">
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- item history -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <span class="fs-4">Item history:</span>
                            <table class="table" id="IhPerItem-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Borrowed date</th>
                                        <th>Returned date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemHistory as $Item)
                                        <tr>
                                            <td>{{ $Item->assigned_to }}</td>
                                            <td>{{ $Item->departmentName->name }}</td>
                                            <td>{{ $Item->deploy_date }}</td>
                                            <td>{{ $Item->return_date ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete item -->
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
@push('scripts')
    <script>
    $(document).ready(function() {
        $('#IhPerItem-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "asc"]],
        });
    });
    </script>
@endpush
@endsection
