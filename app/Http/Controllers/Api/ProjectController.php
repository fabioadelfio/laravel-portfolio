<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // restituisce tutti i progetti con relazioni
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();
        return response()->json($projects);
    }

    // restituisce un singolo progetto con relazioni
    public function show($id)
    {
        $project = Project::with('type', 'technologies')->find($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found'
            ], 404);
        }

        return response()->json($project);
    }
}
