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
        $archive = DB::select('select * from files left join events on files.event_id = events.id where files.id = :id', ['id' => $id]);
    }

    public function getAllFiles()
    {
        $archives = DB::select('select file_name from files where id = 25');
        return view('layouts/test',array('archives'=>$archives));
    }
}