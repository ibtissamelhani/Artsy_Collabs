<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $STATUS_RADIO = Project::STATUS_RADIO;
        $projects = Project::where('status', '!=', '3')->get();
        return view('artist.home',compact('projects','STATUS_RADIO'));
    }

    public function show($id)
    {
        $STATUS_RADIO = Project::STATUS_RADIO;
        $project = Project::find($id);
        return view('artist.show' , compact('project','STATUS_RADIO'));
    }

    
}
