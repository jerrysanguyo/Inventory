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
                        <td>{{ $inventory->departmentName->name }}</td>
                        <td>{{ $inventory->assigned_to }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="dropdown-item" href="{{ route('admin.inventory.edit', ['inventory' => $inventory->id]) }}">
                                        <button class="btn btn-primary">
                                            Update
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('admin.inventory.destroy', $inventory->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('Are you sure you want to delete this inventory?');" value="Delete" class="btn btn-danger">
                                    </form>
                                </div>
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
