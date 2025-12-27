<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//for scholarship
use App\Models\Scholarship;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //// Fetch all scholarships from database
    $scholarships = Scholarship::all();

    // Send data to view
    return view('admin.scholarships.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.scholarships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'eligibility' => 'required|string',
            'amount' => 'required|numeric',
            'deadline' => 'required|date',
            'funded_by' => 'required|string|max:255',
        ]);

        Scholarship::create($request->all());

        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Scholarship created successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
          $scholarship = Scholarship::findOrFail($id);
    return view('admin.scholarships.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'eligibility' => 'required',
            'amount' => 'required|numeric',
            'deadline' => 'required|date',
            'funded_by' => 'required',
        ]);
    
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->update($request->all());
    
        return redirect()
            ->route('admin.scholarships.index')
            ->with('success', 'Scholarship updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Scholarship::findOrFail($id)->delete();

    return redirect()
        ->route('admin.scholarships.index')
        ->with('success', 'Scholarship deleted successfully');
    }
}
