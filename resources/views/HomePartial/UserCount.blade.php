<div class="card border-0 shadow mt-3">
    <div class="card-body overflow-x-auto">
        <span class="fs-4"><i class="fa-solid fa-truck-field m-3"></i> Upcoming events</span>
        <!-- <div class="row align-items-end mt-4">
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
        </div> -->
        <table class="table" id="event-table">
            <thead>
                <tr>
                    <th>Venue</th>
                    <th>Date and time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listOfEvent as $event)
                <tr>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->event_date }} | {{ $event->venue_time_start }} - {{ $event->venue_time_end }}</td>
                    <td>
                        <a href="{{ route('admin.event.show', ['event'=>$event->id]) }}">
                            <button class="btn btn-primary">Details</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>