@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-laptop m-3"></i>Total Equipment</span>
                        <div class="row align-items-end mt-4">
                            <div class="col-md-4">
                                <label for="startDateEquip" class="form-label">Start date:</label>
                                <input type="date" id="startDateEquip" class="form-control"> 
                            </div>
                            <div class="col-md-4">
                                <label for="endDateEquip" class="form-label">End date:</label>
                                <input type="date" id="endDateEquip" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex justify-content-md-start">
                                <button class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span class="fs-1">100 - Equipment</span>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">View details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-handshake m-3"></i>Total Borrowed</span>
                        <div class="row align-items-end mt-4">
                            <div class="col-md-4">
                                <label for="startDateBor" class="form-label">Start date:</label>
                                <input type="date" id="startDateBor" class="form-control"> 
                            </div>
                            <div class="col-md-4">
                                <label for="endDateBor" class="form-label">End date:</label>
                                <input type="date" id="endDateBor" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex justify-content-md-start">
                                <button class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span class="fs-1">100 - Borrowed</span>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">View details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-hand-holding-hand m-3"></i>Total Pull-out</span>
                        <div class="row align-items-end mt-4">
                            <div class="col-md-4">
                                <label for="startDatePull" class="form-label">Start date:</label>
                                <input type="date" id="startDatePull" class="form-control"> 
                            </div>
                            <div class="col-md-4">
                                <label for="endDatePull" class="form-label">End date:</label>
                                <input type="date" id="endDatePull" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex justify-content-md-start">
                                <button class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span class="fs-1">100 - Pull-out</span>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">View details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-person m-3"></i>Total User</span>
                        <div class="row align-items-end mt-4">
                            <div class="col-md-4">
                                <label for="startDateUser" class="form-label">Start date:</label>
                                <input type="date" id="startDateUser" class="form-control"> 
                            </div>
                            <div class="col-md-4">
                                <label for="endDateUser" class="form-label">End date:</label>
                                <input type="date" id="endDateUser" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex justify-content-md-start">
                                <button class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span class="fs-1">100 - User</span>
                        </div>
                        <div class="row">
                            <button class="btn btn-primary">View details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-timeline m-3"></i>Borrowed History</span>
                        <hr>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow mt-3">
                    <div class="card-body">
                        <span class="fs-4"><i class="fa-solid fa-timeline m-3"></i>Pull-out History</span>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
