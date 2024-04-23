<?php

namespace App\Http\Controllers;

use App\Models\EventParticipants;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventParticipantsRequest;
use App\Http\Requests\UpdateEventParticipantsRequest;

class EventParticipantController extends Controller
{
    public function store(StoreEventParticipantsRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();

        EventParticipants::create($validated);

        $eventId = $request->input('event_id');

        return redirect()->route('admin.event.show', ['event' => $eventId])
                        ->with('success', 'Participants assigned successfully');
    }

    public function edit(EventParticipants $participant)
    {
        return view('Event.Participant.edit', compact(
            'participant'
        ));
    }
    
    public function update(UpdateEventParticipantsRequest $request, EventParticipants $participant)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $participant->update($validated);

        $eventId = $request->input('event_id');

        return redirect()->route('admin.event.show', ['event' => $eventId])
                        ->with('success', 'Event updated successfully.');
    }
    
    public function destroy(EventParticipants $participant)
    {
        $deleted = $participant->delete();

        return redirect()->route('admin.event.index')
                        ->with('success', 'Participant deleted successfully.');
    }
}
