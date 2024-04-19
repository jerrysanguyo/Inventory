@extends('layouts.app')

@section('content')
<div class="container-fluid">
<!-- upper section -->
    <div class="row">
        <div class="col-md-4">
            @include('HomePartial/EquipmentChart')
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    @include('HomePartial/EquipmentCount')
                </div>
                <div class="col-md-6">
                    @include('HomePartial/BorrowedCount')
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @include('HomePartial/ReturnCount')
                </div>
                <div class="col-md-6">
                    @include('HomePartial/UserCount')
                </div>
            </div>
        </div>
    </div>
<!-- middle section -->
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
<!-- lower section -->
    <div class="row mt-3">
        <div class="col-md-6">
            @include('HomePartial/ItemHistoryTable')
        </div>
        <div class="col-md-6">
            @include('HomePartial/ItemHistoryChart')
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
                },
                datalabels: {
                    color: '#ffffff',
                    anchor: 'end',
                    align: 'start',
                    offset: 10,
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    formatter: (value, context) => {
                        let sum = context.dataset.data.reduce((a, b) => a + b, 0);
                        let percentage = (value / sum * 100).toFixed(2) + '%';
                        return context.chart.data.labels[context.dataIndex] + ': ' + percentage;
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
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
        'rgba(75, 0, 130, 0.6)',
        'rgba(165, 42, 42, 0.6)',
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
                    text: 'Equipment in inventory'
                },
                datalabels: {
                    color: '#ffffff',
                    anchor: 'end',
                    align: 'start',
                    offset: 50,
                    font: {
                        weight: 'bold',
                        size: 13
                    },
                    formatter: (value, context) => {
                        let sum = context.dataset.data.reduce((a, b) => a + b, 0);
                        let percentage = (value / sum * 100).toFixed(2) + '%';
                        return percentage;
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // Count top
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
@endpush
@endsection
