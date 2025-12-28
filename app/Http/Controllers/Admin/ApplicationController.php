<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;

class ApplicationController extends Controller
{
    // List all applications
    public function index()
    {
        $applications = Application::with(['user', 'scholarship'])->get();
        return view('admin.applications.index', compact('applications'));
    }

    // Approve application
    public function approve($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        return back()->with('success', 'Application approved.');
    }

    // Reject application
    public function reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return back()->with('success', 'Application rejected.');
    }
}
