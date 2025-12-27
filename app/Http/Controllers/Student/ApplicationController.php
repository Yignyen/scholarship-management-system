<?php



namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, $scholarshipId)
    {
        return "Application submitted successfully";
    }
}
