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
        $result = DB::select('select * from events where id = :id', ['id' => $id]);
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