<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $STATUS_RADIO = Project::STATUS_RADIO;
        $projects = Project::where('status', '!=', '3')->get();
        return view('artist.home',compact('projects','STATUS_RADIO'));
    }
}
