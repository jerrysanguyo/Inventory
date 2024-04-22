<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\DataTables\EventDataTable;

class EventController extends Controller
{
    public function index(EventDataTable $DataTable)
    {
        $listOfEvent = Event::getAllEvent();
        return $DataTable->render('Event.index', compact(
            'listOfEvent',
            'DataTable'
        ));
    }
    
    public function create()
    {
        return view('Event.create');
    }
    
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();

        Event::create($validated);

        return redirect()->route('admin.event.index')
                        ->with('success', 'Event created successfully.');
    }
    
    public function show(Event $event)
    {
        //
    }
    
    public function edit(Event $event)
    {
        return view('Event.edit', compact(
            'event'
        ));
    }
    
    public function update(UpdateEventRequest $request, Event $event)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $event->update($validated);

        return redirect()->route('admin.event.index')
                        ->with('success', 'Event updated successfully.');
    }
    
    public function destroy(Event $event)
    {
        $deleted = $event->delete();

        return redirect()->route('admin.event.index')
                        ->with('success', 'Event deleted successfully.');
    }
}
