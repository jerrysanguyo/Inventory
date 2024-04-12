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
                                <button id="generateButtonEquipment" class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span id="equipmentCount" class="fs-1">{{ $totalCountItem }} - Equipment</span>
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
                                <button id="generateButtonBorrowed" class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span id="borrowCount" class="fs-1">{{ $totalCountBorrowed }} - Borrowed</span>
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
                                <button id="generateButtonReturn" class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span id="returnCount" class="fs-1">{{ $totalCountReturn }} - Pull-out</span>
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
                                <button id="generateButtonUser" class="btn btn-primary mt-4 mt-md-0">Generate</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center m-3"> 
                            <span id="userCount" class="fs-1">{{ $totalUser }} - User</span>
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    function fetchData(buttonId, route, startDateId, endDateId, countClass) {
        const button = document.getElementById(buttonId);
        button.onclick = () => {
            fetch(route, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    startDate: document.getElementById(startDateId).value || null,
                    endDate: document.getElementById(endDateId).value || null
                })
            })
            .then(res => res.json())
            .then(data => document.querySelector(countClass).textContent = `${data.count}`)
            .catch(err => console.error('Error:', err));
        };
    }
    
    fetchData('generateButtonEquipment', '{{ route("admin.equipment.count") }}', 'startDateEquip', 'endDateEquip', '#equipmentCount');
    fetchData('generateButtonBorrowed', '{{ route("admin.counts.borrowed") }}', 'startDateBor', 'endDateBor', '#borrowCount');
    fetchData('generateButtonReturn', '{{ route("admin.counts.returned") }}', 'startDatePull', 'endDatePull', '#returnCount');
    fetchData('generateButtonUser', '{{ route("admin.counts.users") }}', 'startDateUser', 'endDateUser', '#userCount');
});
</script>
@endsection
