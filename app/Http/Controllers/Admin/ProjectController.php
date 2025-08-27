<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\Type;
use App\Models\Technology;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', [
            'types' => $types,
            'technologies' => $technologies,
            'project' => new Project(), // così esiste sempre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $data['slug'] = Str::slug($data['title'], '-');

        $project = Project::create($data);

        // associa tecnologie scelte
        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
        ]);

        $data['slug'] = Str::slug($data['title'], '-');

        $project->update($data);

        // aggiorna tecnologie (se non seleziono nulla -> array vuoto)
        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo!');
    }
}
