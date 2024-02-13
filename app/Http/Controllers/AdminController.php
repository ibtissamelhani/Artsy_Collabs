<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $requests = ProjectUser::with('user', 'project')
        ->where('status', 1)
        ->get();
        $usersCount = User::count();
        $projectCount = Project::count();
        $partnersCount = Partner::count();
        return view('admin.dashboard', compact('partnersCount','projectCount','usersCount','requests'));
    }
}
