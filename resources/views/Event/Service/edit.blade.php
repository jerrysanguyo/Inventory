@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Service / Service Edit</span>
        <a href="{{ route('admin.service.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.service.update', ['service' => $service->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-lg-12">
                    <label for="driver_name" class="form-label">Driver name:</label>
                    <input type="text" name="driver_name" id="driver_name" class="form-control" value="{{ $service->driver_name }}">
                    <input type="text" name="event_id" id="eventse" class="form-control" value="{{ $service->event_id }}" hidden>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="mobile_number" class="form-label">Mobile number:</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $service->mobile_number }}">
                    </div>
                    <div class="col-lg-6">
                        <label for="plate_number" class="form-label">Plate number:</label>
                        <input type="text" name="plate_number" id="plate_number" class="form-control" value="{{ $service->plate_number }}">
                    </div>
                </div>
                <div class="col-lg-12 mt-3">
                    <input type="submit" value="Update Driver" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
