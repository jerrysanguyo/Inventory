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