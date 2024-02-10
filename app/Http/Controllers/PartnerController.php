<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
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
    public function store(Request $request)
    {
        $partner = Partner::create($request->all());
        $partner->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('partners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('admin.partner.show' , compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->all());
        $partner->clearMediaCollection('images'); 
        $partner->addMediaFromRequest('image')->toMediaCollection('images');
        return redirect()->route('partners.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index');
    }
}
