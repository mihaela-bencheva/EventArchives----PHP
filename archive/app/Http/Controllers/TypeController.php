<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class TypeController extends BaseController
{
    public function getAllTypes()
    {
        $types = DB::select('select * from types');
        return view('layouts/type',array('types'=>$types));
    }

    public function getTypeById($id)
    {
        $type = DB::select('select * from types where id = :id', ['id' => $id]);

        $event_types = DB::select('select * from event_types where type_id = :id', ['id' => $id]);

        $events = array();
        foreach($events as $event) 
        {
            $events = Event::all()->where('id', (int)$event);
        }
        return view('layouts/current-type', compact('type','events'));
    }

    public function searchByTypeOfEvent(Request $request)
    {
        $typeInput = $request->input('search-type');

        $event_types = DB::table('events')
            ->join('event_types', 'events.id', '=', 'event_types.event_id')
            ->join('types', 'event_types.type_id', '=', 'types.id')
            ->select('types.name', 'events.event_name', 'events.image', 'events.event_year')
            ->where('types.name', 'LIKE', "%{$typeInput}%")
            ->get();

        return view('layouts/type', compact('event_types'));
    }

    public function searchByAll()
    {
        return view('layouts/search');
    }
}