<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    public function getAllEvents()
    {
        $events = DB::select('select * from events');
        return view('layouts/event',array('events'=>$events));
    }

    public function getEventById($id)
    {
        $event = DB::select('select * from events where id = :id', ['id' => $id]);

        $event_types = DB::select('select * from event_types where event_id = :id', ['id' => $id]);

        $types = array();
        foreach($event_types as $event_type)
        {
            $types[] = Type::all()->where('id', (int)$event_type);
        }

        $archives = DB::select('select * from events left join files on events.id = files.event_id where events.id = :id', ['id' => $id]);
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