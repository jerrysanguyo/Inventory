@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Department</span>
        <a href="{{ route('admin.department.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add Department
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
            <table class="table" id="department-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Created By</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfDepartment as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->creator->name }}</td>
                        <td>{{ $department->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="dropdown-item" href="{{ route('admin.department.edit', ['department' => $department->id]) }}">
                                        <button class="btn btn-primary">
                                            Update
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('admin.department.destroy', $department->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('Are you sure you want to delete this department?');" value="Delete" class="btn btn-danger">
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
        $('#department-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "asc"]],
        });
    });
    </script>
@endpush
@endsection
