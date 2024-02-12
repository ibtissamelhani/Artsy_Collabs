<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deletedPartners = Partner::onlyTrashed()->get();
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners','deletedPartners'));
    }


    public function restore($id)
    {
        $partner = Partner::withTrashed()->find($id)->restore();
        return redirect()->route('partners.index')->with('success', 'Livre restauré avec succès.');
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
    public function store(StorePartnerRequest $request)
    {
        try{
            $partner = Partner::create($request->all());
            $partner->addMediaFromRequest('image')->toMediaCollection('images');
            return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
        
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
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        try{
            $partner->update($request->all());
            if ($request->hasFile('image')) {
               $partner->clearMediaCollection('images'); 
               $partner->addMediaFromRequest('image')->toMediaCollection('images'); 
            }
            
            return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
       
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}
