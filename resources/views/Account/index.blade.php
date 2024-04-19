@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Account</span>
        <a href="{{ route('admin.account.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add Account
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body overflow-x-auto">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table" id="account-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfUser as $User)
                    <tr>
                        <td>{{ $User->id }}</td>
                        <td>{{ $User->name }}</td>
                        <td>{{ $User->email }}</td>
                        <td>{{ $User->role }}</td>
                        <td>{{ $User->created_at }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.account.edit', ['account'=>$User->id]) }}">
                                            Update
                                        </a>
                                    </li>
                                    @if($User->id != '1')
                                    <li>
                                        <form action="{{ route('admin.account.destroy', ['account' => $User->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="dropdown-item">Delete Account</button>
                                        </form>
                                    </li>
                                    @endif
                                    @if($User->role === 'user')
                                    <li>
                                        <form action="{{ route('admin.account.makeAdmin', ['account' => $User->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="dropdown-item">Assign to Admin</button>
                                        </form>
                                    </li>
                                    @else
                                    <li>
                                        <form action="{{ route('admin.account.makeUser', ['account' => $User->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="dropdown-item">Assign to User</button>
                                        </form>
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
        $('#account-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection
