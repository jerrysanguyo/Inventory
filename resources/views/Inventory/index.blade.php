@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Inventory</span>
        <a href="{{ route('admin.inventory.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add Item
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
            <table class="table" id="inventory-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Inventory Name</th>
                        <th>Item type</th>
                        <th>Serial Number</th>
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
                        <td>{{ $inventory->latestDeployment->departmentName->name ?? 'N/A' }}</td>
                        <td>{{ $inventory->latestDeployment->assigned_to ?? 'N/A'  }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
            "order": [[0, "asc"]],
        });
    });
    </script>
@endpush
@endsection
