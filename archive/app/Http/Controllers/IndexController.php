<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('index.index', [
            'title' => 'Welcome',
            'text' => '
            <hr />
            <h3>Students CMS Project</h3>
            <p>This is a CMS for managing events and their archives.</p>'
        ]);
    }
}
