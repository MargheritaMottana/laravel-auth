<?php

namespace App\Http\Controllers\Admin;

// controller
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // richiedo tutti i dati con validazione backend
        $data = $request->validate([
            'title'=> 'required|min:3|max:64',
            'description'=> 'required|min:20|max:4096',
            'cover'=> 'nullable|url|min:5|max:2048',
            'client'=> 'nullable|min:3|max:64',
            'sector'=> 'nullable|min:3|max:64',
            'published'=> 'nullable|in:1,0,true,false',
        ]);
        
        // aggiunto lo slug perché non l'ho messo nel form
        $data['slug'] = str()->slug($data['title']);
        // verifico che per il valore booleano, sia effettivamente passato qualcosa
        $data['published'] = isset($data['published']);

        $project = Project::create($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'=> 'required|min:3|max:64',
            'description'=> 'required|min:20|max:4096',
            'cover'=> 'nullable|url|min:5|max:2048',
            'client'=> 'nullable|min:3|max:64',
            'sector'=> 'nullable|min:3|max:64',
            'published'=> 'nullable|in:1,0,true,false',
        ]);
        
        $data['slug'] = str()->slug($data['title']);
        $data['published'] = isset($data['published']);

        $project->update($data);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
