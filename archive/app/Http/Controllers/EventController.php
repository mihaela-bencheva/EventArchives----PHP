<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Type;

class EventController extends BaseController
{
    public function getAllEvents()
    {
        $events = DB::select('select * from events');
        return view('layouts/event',array('events'=>$events));
    }

    public function getEventById($id)
    {
        $event = Event::where('id', $id)
            ->first();

        $types = DB::table('events')
            ->join('event_types', 'events.id', '=', 'event_types.event_id')
            ->join('types', 'event_types.type_id', '=', 'types.id')
            ->select('types.id','types.name')
            ->where('events.id', $id)
            ->get();
        
        $archives = DB::table('events')
            ->join('files', 'events.id', '=', 'files.event_id')
            ->select('files.archive_name', 'files.created_at')
            ->where('events.id', $id)
            ->get();

        return view('layouts.events.current-event', compact('event', 'types', 'archives'));
    }

    public function searchByEventName(Request $request)
    {
        $eventName = $request->input('search-name');

        $events = Event::query()
            ->where('event_name', 'LIKE', "%{$eventName}%")
            ->get();

        return view('layouts/event', compact('events'));
    }
}