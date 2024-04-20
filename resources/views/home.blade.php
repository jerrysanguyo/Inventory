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
            @include('HomePartial/ItemBorrowedChart')
        </div>
        <div class="col-md-6">
            @include('HomePartial/ItemReturnChart')
        </div>
    </div>
<!-- lower section -->
    <div class="row">
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
    // option
    const datalabelsPlugin = ChartDataLabels; 
    var globalOptions = {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            title: {
                display: true,
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
                    return percentage;
                }
            }
        },
    };

    // chart color
    var baseColors = [
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(75, 0, 130, 0.6)',
        'rgba(165, 42, 42, 0.6)',
        'rgba(0, 0, 0, 0.6)',
    ];

    var maxItems = Math.max({!! json_encode($equipTypes->keys()) !!}.length, {!! json_encode($totalBorrowedEquipment->keys()) !!}.length, 2);
    var colors = [];
    while (colors.length < maxItems) {
        colors = colors.concat(baseColors);
    }

    // Deployment Chart
    var ctxDeployment = document.getElementById('deploymentChart').getContext('2d');
    var deploymentChart = new Chart(ctxDeployment, {
        type: 'bar',
        plugins: [datalabelsPlugin], 
        data: {
            labels: ['Borrowed', 'Returned'],
            datasets: [{
                label: 'Status Count',
                data: [@json($chartData['borrowed']), @json($chartData['returned'])],
                backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)'],
            }]
        },
        options: {...globalOptions, title: {text: 'Deployment Status'}}
    });

    // Equipment Chart
    var ctxEquipment = document.getElementById('equipmentChart').getContext('2d');
    var equipmentChart = new Chart(ctxEquipment, {
        type: 'doughnut',
        plugins: [datalabelsPlugin], 
        data: {
            labels: {!! json_encode($equipTypes->keys()) !!},
            datasets: [{
                label: 'Equipment Count',
                data: {!! json_encode($equipTypes->values()) !!},
                backgroundColor: colors.slice(0, {!! json_encode($equipTypes->keys()) !!}.length),
            }]
        },
        options: {...globalOptions, title: {text: 'Equipment in Inventory'}}
    });

    // Borrow Chart
    var ctxBorrow = document.getElementById('borrowedItemsChart').getContext('2d');
    var borrowedItemsChart = new Chart(ctxBorrow, {
        type: 'bar',
        plugins: [datalabelsPlugin], 
        data: {
            labels: {!! json_encode($totalBorrowedEquipment->keys()) !!},
            datasets: [{
                label: 'Borrowed Equipment Count',
                data: {!! json_encode($totalBorrowedEquipment->values()) !!},
                backgroundColor: colors,
            }]
        },
        options: {...globalOptions, title: {text: 'Borrowed Equipment per Type'}}
    });

    //Returned Chart
    var ctxReturned = document.getElementById('returnedItemsChart').getContext('2d');
    var returnedItemsChart = new Chart(ctxReturned, {
        type: 'bar',
        plugins: [datalabelsPlugin], 
        data: {
            labels: {!! json_encode($totalReturnedEquipment->keys()) !!},
            datasets: [{
                label: 'Returned Equipment Count',
                data: {!! json_encode($totalReturnedEquipment->values()) !!},
                backgroundColor: colors,
                borderColor: colors.map(color => color.replace('0.6', '1')),
                borderWidth: 1
            }]
        },
        options: {...globalOptions, title: {text: 'Returned Equipment per Type'}}
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
