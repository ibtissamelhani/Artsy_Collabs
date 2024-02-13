<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function store(Request $request, User $user){
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $user->projects()->syncWithoutDetaching([$request->project_id => ['task' => $request->task]]);
            
        return redirect()->route('users.show', $user->id);
    }
    public function collaborate(Request $request, User $user){
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        $user->projects()->syncWithoutDetaching([$request->project_id => ['task' => $request->task, 'status'=>1]]);
        return redirect()->route('Artists.show', $request->project_id)->with('success', 'your request to collaborate is sent successfully.');
    }

    
 
}
