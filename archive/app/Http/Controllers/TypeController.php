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
        $result = DB::select('select * from events where id = :id', ['id' => $id]);
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