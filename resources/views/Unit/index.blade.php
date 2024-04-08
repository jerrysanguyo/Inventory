@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Unit</span>
        <a href="{{ route('admin.unit.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add unit
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
            <table class="table" id="unit-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>unit Name</th>
                        <th>Created By</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfUnit as $unit)
                    <tr>
                        <td>{{ $unit->id }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->creator->name }}</td>
                        <td>{{ $unit->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="dropdown-item" href="{{ route('admin.unit.edit', ['unit' => $unit->id]) }}">
                                        <button class="btn btn-primary">
                                            Update
                                        </button>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <form action="{{ route('admin.unit.destroy', $unit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('Are you sure you want to delete this unit?');" value="Delete" class="btn btn-danger">
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
        $('#unit-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "asc"]],
        });
    });
    </script>
@endpush
@endsection
