<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Http\Requests\StoreEventServiceRequest;
use App\Http\Requests\UpdateEventServiceRequest;

class EventServiceController extends Controller
{
    public function store(StoreEventServiceRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();

        EventService::create($validated);

        $eventId = $request->input('event_id');

        return redirect()->route('admin.event.show', ['event' => $eventId])
                        ->with('success', 'Driver assgined successfully.');
    }

    public function edit(EventService $service)
    {
        return view('Event.Service.edit', compact(
            'service'
        ));
    }
    
    public function update(UpdateEventServiceRequest $request, EventService $service)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $service->update($validated);

        $eventId = $request->input('event_id');

        return redirect()->route('admin.event.show', ['event' => $eventId])
                        ->with('success', 'Event updated successfully.');
    }
    
    public function destroy(EventService $service)
    {
        $deleted = $service->delete();

        return redirect()->route('admin.event.index')
                        ->with('success', 'Service deleted successfully.');
    }
}
