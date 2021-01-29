<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Archivefile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchiveController extends BaseController
{
    public function getAllArchives()
    {
        $archives = DB::select('select * from files');
        return view('layouts/archive',array('archives'=>$archives));
    }

    public function getArchiveById($id)
    {
        $archive_event = DB::table('events')
            ->join('files', 'events.id', '=', 'files.event_id')
            ->select('files.archive_name', 'files.description', 'files.created_at', 'events.event_name', 'events.event_year', 'events.id')
            ->where('files.id', $id)
            ->get();
        return view('layouts.archives.current-archive', compact('archive_event'));
    }
}