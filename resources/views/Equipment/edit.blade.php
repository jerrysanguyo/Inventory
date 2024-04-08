@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-3">Equipment / Equipment Edit</span>
        <a href="{{ route('admin.equipment.index') }}" class="text-decoration-none">
            <button class="btn btn-primary">
                    Back
            </button>
        </a>
    </div>
    <div class="card justify-content-center">
        <div class="card-body">
            <form action="{{ route('admin.equipment.update', ['equipment' => $equipment->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="dpname" class="form-label">Equipment name:</label>
                        <input type="text" name="name" id="dpname" class="form-control" value="{{ $equipment->name }}">
                    </div>
                    <div class="col-md-12 d-flex justify-content-end mt-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
