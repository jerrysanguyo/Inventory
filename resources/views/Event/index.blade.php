@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">Event</span>
        <a href="{{ route('admin.event.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add Event
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
            <table class="table" id="event-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Venue</th>
                        <th>Date and time</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfEvent as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>{{ $event->event_date }} | {{ $event->venue_time_start }} - {{ $event->venue_time_end }}</td>
                        <td>{{ $event->remarks }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.event.edit', ['event' => $event->id]) }}">
                                            Update
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.event.show', ['event' => $event->id]) }}">
                                            View details
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <input type="submit" onclick="return confirm('Are you sure you want to delete this event?');" value="Delete" class="dropdown-item">
                                    </form>
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
        $('#event-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection
