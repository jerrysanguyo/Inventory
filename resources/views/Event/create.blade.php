@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <span class="fs-3">Event / Event Create</span>
        <a href="{{ route('admin.event.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.event.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label for="event_name" class="form-label">Event name:</label>
                        <input type="text" name="venue" id="event_name" class="form-control">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="point_person" class="form-label">Point person:</label>
                        <input type="text" name="point_person" id="point_person" class="form-control">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label for="mobile_number" class="form-label">Point person mobile number:</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="event_date" class="form-label">Date:</label>
                        <input type="date" name="event_date" id="event_date" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="venue_time_start" class="form-label">Time start:</label>
                        <input type="time" name="venue_time_start" id="venue_time_start" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label for="venue_time_end" class="form-label">Time end:</label>
                        <input type="time" name="venue_time_end" id="venue_time_end" class="form-control">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <label for="remarks" class="form-label">Remarks:</label>
                        <input type="text" name="remarks" id="remarks" class="form-control">
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-12 d-flex justify-content-end mt-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
