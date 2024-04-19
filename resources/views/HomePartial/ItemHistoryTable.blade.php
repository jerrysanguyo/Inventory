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