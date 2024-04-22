@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Participant / Participant Edit</span>
        <a href="{{ route('admin.participant.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.participant.update', ['participant' => $participant->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-lg-12">
                    <label for="participants" class="form-label">Participants</label>
                    <input type="text" name="name" id="participants" class="form-control" value="{{ $participant->name }}">
                    <input type="text" name="event_id" id="eventpar" class="form-control" value="{{ $participant->event_id }}" hidden>
                </div>
                <div class="col-lg-12 mt-3">
                    <input type="submit" value="Add participant" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
