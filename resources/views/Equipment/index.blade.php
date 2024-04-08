@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Equipment</span>
        <a href="{{ route('admin.equipment.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add equipment
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
            <table class="table" id="equipment-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipment Name</th>
                        <th>Created By</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfEquipment as $equipment)
                    <tr>
                        <td>{{ $equipment->id }}</td>
                        <td>{{ $equipment->name }}</td>
                        <td>{{ $equipment->creator->name }}</td>
                        <td>{{ $equipment->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="dropdown-item" href="{{ route('admin.equipment.edit', ['equipment' => $equipment->id]) }}">
                                        <button class="btn btn-primary">
                                            Update
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('admin.equipment.destroy', $equipment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('Are you sure you want to delete this equipment?');" value="Delete" class="btn btn-danger">
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
        $('#equipment-table').DataTable({
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
