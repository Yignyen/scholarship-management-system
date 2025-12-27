<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// for scholarship 
use App\Models\Scholarship;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;



class ScholarshipController extends Controller
{
    // List all scholarships
    public function index()
    {
        // Get all scholarships posted by admin
        $scholarships = Scholarship::all();

// Get list of scholarship IDs that the currently logged-in student has already applied to
        $applications = Application::where('user_id', Auth::id())
                    ->pluck('scholarship_id')
                    ->toArray();

        return view('student.dashboard', compact('scholarships', 'applications'));
    }

    // Show application form
    public function create($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('student.applications.create', compact('scholarship'));
    }

    // Store application
    public function store(Request $request, $id)
    {
        // logic from previous application store code
    }

    // Edit own application
    public function edit($id)
    {
        $application = Application::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('student.applications.edit', compact('application'));
    }

    public function update(Request $request, $id)
    {
        $application = Application::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        // validate and update logic
    }
}
