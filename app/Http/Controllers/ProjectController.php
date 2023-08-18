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
        $atributes = $request->validate([
            'name' => 'required|min:3|max:100'
        ]);

        Project::create(array_merge(
            $atributes,
            [
                'created_by' => Auth::id(),
            ]
        ));

        return redirect('projects')->with('success','New Project added successfully');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destory()
    {
    }
}
