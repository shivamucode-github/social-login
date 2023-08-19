<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $users = User::all();
        return view('projects.index', compact(['projects', 'users']));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:100'
        ]);

        Project::create(array_merge(
            $attributes,
            [
                'created_by' => Auth::id(),
                'modified_by' => Auth::id()
            ]
        ));

        return redirect('projects')->with('success', 'New Project added successfully');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:100'
        ]);

        $project->update(array_merge(
            $attributes,
            [
                'modified_by' => Auth::id(),
            ]
        ));

        return redirect('projects')->with('success','Project Updated Successfully');
    }

    public function destory(Project $project)
    {
        $project->delete();

        return redirect('projects')->with('success','Project Deleted');
    }
}
