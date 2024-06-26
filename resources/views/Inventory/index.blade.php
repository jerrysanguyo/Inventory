@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">Inventory</span>
    @if (Auth::user()->role === 'admin')
        <div class="ms-auto"> 
            <a href="{{ route('admin.inventory.create') }}" class="text-decoration-none me-2 btn btn-primary">
                Add Item
            </a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dataImport">
                Import Data
            </button>

            <div class="modal fade" id="dataImport" tabindex="-1" aria-labelledby="dataImportLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="dataImportLabel">Import Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                @method('POST')
                                <input type="file" class="form-control" name="file" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Import Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card justify-content-center">
        <div class="card-body overflow-x-auto">
            <span class="fs-4">Generate report:</span>
            <form action="{{ route('inventory.export') }}" method="GET">
                @csrf
                <div class="row align-items-end mb-4">
                    <div class="col-lg-1 col-md-5">
                        <label for="startDate" class="form-label">Start date:</label>
                        <input type="date" id="startDate" name="startDate" class="form-control"> 
                    </div>
                    <div class="col-lg-1 col-md-5">
                        <label for="endDate" class="form-label">End date:</label>
                        <input type="date" id="endDate" name="endDate" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-2 d-flex justify-content-lg-start">
                        <button class="btn btn-primary mt-4 mt-lg-0">Generate</button>
                    </div>
                </div>
            </form>
        @else
        <div class="ms-auto"> 
            <a href="{{ route('user.inventory.create') }}" class="text-decoration-none me-2 btn btn-primary">
                Add Item
            </a>
        </div>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
    @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-success">
                    {{ session('warning') }}
                </div>
            @endif
            <table class="table" id="inventory-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Inventory Name</th>
                        <th>Item type</th>
                        <th>Serial Number</th>
                        <th>Status</th>
                        <th>Department</th>
                        <th>Issued to</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfInventory as $inventory)
                    <tr>
                        <td>{{ $inventory->id }}</td>
                        <td>{{ $inventory->name }}</td>
                        <td>{{ $inventory->equipmentName->name }}</td>
                        <td>{{ $inventory->serial_number }}</td>
                        <td>{{ $inventory->latestDeployment->status ?? 'In-stock' }}</td>
                        <td>{{ $inventory->latestDeployment->departmentName->name ?? 'N/A' }}</td>
                        <td>{{ $inventory->latestDeployment->assigned_to ?? 'N/A'  }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    
                                @if(Auth::user()->role === 'admin') 
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.inventory.edit', ['inventory' => $inventory->id]) }}">
                                            Update
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.inventory.show', ['inventory' => $inventory->id]) }}">
                                            View Details
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.inventory.edit', ['inventory' => $inventory->id]) }}">
                                            Update
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.inventory.show', ['inventory' => $inventory->id]) }}">
                                            View Details
                                        </a>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    $(document).ready(function() {
        $('#inventory-table').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection
