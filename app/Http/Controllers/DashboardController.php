<?php

namespace App\Http\Controllers;

use App\Models\GeneralCondition;
use App\Models\Project;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $staffCount = Staff::count();
        $generalConditionCount = GeneralCondition::count();
        
        $recentProjects = Project::orderBy('created_at', 'desc')->take(5)->get();
        $recentStaff = Staff::orderBy('created_at', 'desc')->take(5)->get();
        $recentGeneralConditions = GeneralCondition::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'projectCount', 'staffCount', 'generalConditionCount',
            'recentProjects', 'recentStaff', 'recentGeneralConditions'
        ));
    }

}