<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Archivefile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ArchiveController extends BaseController
{
    public function getAllArchives()
    {
    }

    public function getArchiveById($id)
    {
    }

    public function getAllArchivesByEventId(Request $request)
    {
    }
}