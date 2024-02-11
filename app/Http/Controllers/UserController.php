<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.index', compact('users','roles'));
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
    public function store(StoreUserRequest $request)
    {
            try {
                $user = User::create($request->all());
                $user->addMediaFromRequest('profile')->toMediaCollection('profiles');
                return redirect()->route('users.index')->with('success', 'User created successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error occurred while processing your request.');
            }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try{
             $user->update($request->all());
        if ($request->hasFile('profile')) {
            $user->clearMediaCollection('profiles'); 
            $user->addMediaFromRequest('profile')->toMediaCollection('profiles');
        }
        return redirect()->route('users.index')->with('success', 'User Updated successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
