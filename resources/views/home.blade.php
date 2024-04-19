@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- upper section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    <canvas id="equipmentChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow mt-3">
                        <div class="card-body overflow-x-auto">
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
                            <div class="d-grid gap-2 text-center">
                                @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.inventory.index') }}">
                                @else
                                <a href="{{ route('user.inventory.index') }}">
                                @endif
                                    <button class="btn btn-primary">View details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow mt-3">
                        <div class="card-body overflow-x-auto">
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
                            <div class="d-grid gap-2 text-center">
                                @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.inventory.index') }}">
                                @else
                                <a href="{{ route('user.inventory.index') }}">
                                @endif
                                    <button class="btn btn-primary">View details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow mt-3">
                        <div class="card-body overflow-x-auto">
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
                            <div class="d-grid gap-2 text-center">
                                @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.inventory.index') }}">
                                @else
                                <a href="{{ route('user.inventory.index') }}">
                                @endif
                                    <button class="btn btn-primary">View details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow mt-3">
                        <div class="card-body overflow-x-auto">
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
                            <div class="d-grid gap-2 text-center">
                                <a href="{{ route('admin.account.index') }}">
                                    <button class="btn btn-primary">View details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- lower section -->
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card border-0 shadow mt-3 overflow-x-auto">
                <div class="card-body">
                    <span class="fs-4"><i class="fa-solid fa-timeline m-3"></i>Item History</span>
                    <hr>
                    <table class="table" id="itemHist-table">
                        <thead>
                            <tr>
                                <th>Issued to</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Deploy date</th>
                                <th>Return date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listOfDeployment as $deployment)
                            <tr>
                                <td>{{ $deployment->assigned_to }}</td>
                                <td>{{ $deployment->department_id }}</td>
                                <td>{{ $deployment->status }}</td>
                                <td>{{ $deployment->deploy_date }}</td>
                                <td>{{ $deployment->return_date ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    <span class="fs-4"><i class="fa-solid fa-chart-simple m-3"></i>Item history Chart</span>
                    <hr>
                    <canvas id="deploymentChart" style="max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    $(document).ready(function() {
        $('#itemHist-table').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Deployment Chart
    var ctxDeployment = document.getElementById('deploymentChart').getContext('2d');
    var deploymentChart = new Chart(ctxDeployment, {
        type: 'bar',
        data: {
            labels: ['Borrowed', 'Returned'],
            datasets: [{
                label: 'Status Count',
                data: [@json($chartData['borrowed']), @json($chartData['returned'])],
                backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Deployment Status'
                }
            }
        }
    });

    // Equipment Chart
    var ctxEquipment = document.getElementById('equipmentChart').getContext('2d');

    var colors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)', 
        'rgba(75, 192, 192, 0.6)', 
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)', 
    ];

    while (colors.length < {!! json_encode($equipTypes->keys()) !!}.length) {
        colors = colors.concat(colors);
    }

    var equipmentChart = new Chart(ctxEquipment, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($equipTypes->keys()) !!},
            datasets: [{
                label: 'Equipment Count',
                data: {!! json_encode($equipTypes->values()) !!},
                backgroundColor: colors.slice(0, {!! json_encode($equipTypes->keys()) !!}.length), 
                borderColor: colors.map(color => color.replace('0.6', '1')),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Equipment Types and Counts'
                }
            }
        }
    });

    // Function to handle data fetching and updating UI
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
    
    // Invoke the fetchData function for different buttons
    fetchData('generateButtonEquipment', '{{ route("admin.equipment.count") }}', 'startDateEquip', 'endDateEquip', '#equipmentCount');
    fetchData('generateButtonBorrowed', '{{ route("admin.counts.borrowed") }}', 'startDateBor', 'endDateBor', '#borrowCount');
    fetchData('generateButtonReturn', '{{ route("admin.counts.returned") }}', 'startDatePull', 'endDatePull', '#returnCount');
    fetchData('generateButtonUser', '{{ route("admin.counts.users") }}', 'startDateUser', 'endDateUser', '#userCount');
});
</script>
@endsection
