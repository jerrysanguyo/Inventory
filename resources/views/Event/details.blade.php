@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">Event / Event Details</span>
        <a href="{{ route('admin.event.create') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Add Event
            </button>
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow justify-content-center mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <span class="fs-4">Item Details:</span>
                    </div>
                    <div class="row">
                        <label for="name" class="col-sm-4 col-form-label">Venue name:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $event->venue ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="event_date" class="col-sm-4 col-form-label">Event date:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="event_date" value="{{ $event->event_date ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="venue_time_start" class="col-sm-4 col-form-label">Time start:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="venue_time_start" value="{{ $event->venue_time_start ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="venue_time_end" class="col-sm-4 col-form-label">Time end:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="venue_time_end" value="{{ $event->venue_time_end ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="address" class="col-sm-4 col-form-label">Address:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="address" value="{{ $event->address ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="point_person" class="col-sm-4 col-form-label">Point person:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="point_person" value="{{ $event->point_person ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="mobile_number" class="col-sm-4 col-form-label">Mobile number:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="mobile_number" value="{{ $event->mobile_number ?? 'N/A'  }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="remarks" class="col-sm-4 col-form-label">Remarks:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="remarks" value="{{ $event->remarks ?? 'N/A'  }}">
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <span class="fs-4">Participants Details:</span>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event->eventParticipants as $participant)
                                <tr>
                                    <td>{{ $participant->name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.participant.edit', ['participant' => $participant->id]) }}">
                                                        Update
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.participant.destroy', ['participant' => $participant->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <input type="submit" onclick="return confirm('Are you sure you want to delete this unit?');" value="Delete" class="dropdown-item">
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
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="fs-4">Add Participants:</span>
                            </div>
                            <form action="{{ route('admin.participant.store') }}" method="POST">
                                @csrf  
                                @method('POST')
                                <div class="col-lg-12">
                                    <label for="participants" class="form-label">Participants</label>
                                    <input type="text" name="name" id="participants" class="form-control">
                                    <input type="text" name="event_id" id="eventpar" class="form-control" value="{{ $event->id }}" hidden>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <input type="submit" value="Add participant" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if(!$serviceExists)
                            <div class="mb-3">
                                <span class="fs-4">Add Service:</span>
                            </div>
                            <form action="{{ route('admin.service.store') }}" method="POST">
                                @csrf  
                                @method('POST')
                                <div class="col-lg-12">
                                    <label for="driver_name" class="form-label">Driver name:</label>
                                    <input type="text" name="driver_name" id="driver_name" class="form-control">
                                    <input type="text" name="event_id" id="eventse" class="form-control" value="{{ $event->id }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="mobile_number" class="form-label">Mobile number:</label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="plate_number" class="form-label">Plate number:</label>
                                        <input type="text" name="plate_number" id="plate_number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <input type="submit" value="Add Driver" class="btn btn-primary">
                                </div>
                            </form>
                            @else
                            <div class="mb-3">
                                <span class="fs-4">Service Details:</span>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Driver's name</th>
                                            <th>Plate number</th>
                                            <th>Mobile number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($event->eventServices as $service)
                                            <tr>
                                                <td>{{ $service->driver_name }}</td>
                                                <td>{{ $service->plate_number }}</td>
                                                <td>{{ $service->mobile_number }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('admin.service.edit', ['service' => $service->id]) }}">
                                                                    Update
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="submit" onclick="return confirm('Are you sure you want to delete this participant?');" value="Delete" class="dropdown-item">
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
