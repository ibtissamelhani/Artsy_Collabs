<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $STATUS_RADIO = Project::STATUS_RADIO;
        $partners = Partner::all();
        return view('admin.project.index', compact('projects','STATUS_RADIO','partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try{
            $project = Project::create($request->all());
            $project->addMediaFromRequest('image')->toMediaCollection('projects');
            return redirect()->route('projects.index')->with('success', 'project created successfully.'); 
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $STATUS_RADIO = Project::STATUS_RADIO;
        return view('admin.project.show', compact('project','STATUS_RADIO'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $STATUS_RADIO = Project::STATUS_RADIO;
        $partners = Partner::all();
        return view('admin.project.edit', compact('project','partners','STATUS_RADIO'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try{
            $project->update($request->all());
            if ($request->hasFile('image')) {
                $project->clearMediaCollection('projects');
                $project->addMediaFromRequest('image')->toMediaCollection('projects');
            }
            return redirect()->route('projects.index')->with('success', 'project updated successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
