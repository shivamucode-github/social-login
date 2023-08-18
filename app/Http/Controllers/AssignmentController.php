<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $users = User::with(['roleAssigned', 'projectAssigned', 'companyAssigned'])->get();
        return view('assign.index', compact(['users']));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        $projects = Project::all();
        $companies = Company::all();
        return view('assign.create', compact(['companies', 'roles', 'projects', 'users']));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user' => 'required',
            'roles' => 'required',
            'projects' => 'required',
            'companies' => 'required'
        ]);

        $user = User::find($attributes['user']);

        $oldRolesAssign = $user->roleAssigned()->get()->pluck('id');
        $newRolesAssign = $request->roles;
        $attachRoles = collect($newRolesAssign)->diff($oldRolesAssign);

        $oldProjectsAssign = $user->projectAssigned()->get()->pluck('id');
        $newProjectsAssign = $request->projects;
        $attachProjects = collect($newProjectsAssign)->diff($oldProjectsAssign);

        $oldCompaniesAssign = $user->CompanyAssigned()->get()->pluck('id');
        $newCompaniesAssign = $request->companies;
        $attachCompanies = collect($newCompaniesAssign)->diff($oldCompaniesAssign);

        if (!$attachRoles->isEmpty()) {
            $user->roleAssigned()->attach($attachRoles);
        }
        if (!$attachProjects->isEmpty()) {
            $user->projectAssigned()->attach($attachProjects);
        }
        if (!$attachCompanies->isEmpty()) {
            $user->companyAssigned()->attach($attachCompanies);
        }

        return redirect('assign')->with('success', 'Roles,Projects and Companies assigned to user');
    }

    public function edit($slug)
    {
        $findUser = User::where('slug', $slug)->with(['roleAssigned', 'projectAssigned', 'companyAssigned'])->first();
        $users = User::all();
        $roles = Role::all();
        $projects = Project::all();
        $companies = Company::all();
        return view('assign.edit', compact(['findUser', 'users', 'projects', 'companies', 'roles']));
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'user' => 'required',
            'roles' => 'required',
            'projects' => 'required',
            'companies' => 'required'
        ]);

        $user = User::find($attributes['user']);

        $oldRolesAssign = $user->roleAssigned()->get()->pluck('id');
        $newRolesAssign = $request->roles;
        $attachRoles = collect($newRolesAssign)->diff($oldRolesAssign);
        $deattachRoles = collect($oldRolesAssign)->diff($newRolesAssign);

        $oldProjectsAssign = $user->projectAssigned()->get()->pluck('id');
        $newProjectsAssign = $request->projects;
        $attachProjects = collect($newProjectsAssign)->diff($oldProjectsAssign);
        $deattachProjects = collect($oldProjectsAssign)->diff($newProjectsAssign);

        $oldCompaniesAssign = $user->CompanyAssigned()->get()->pluck('id');
        $newCompaniesAssign = $request->companies;
        $attachCompanies = collect($newCompaniesAssign)->diff($oldCompaniesAssign);
        $deattachCompanies = collect($oldCompaniesAssign)->diff($newCompaniesAssign);

        if (!$deattachRoles->isEmpty()) {
            $user->roleAssigned()->detach($deattachRoles);
        }
        if (!$deattachProjects->isEmpty()) {
            $user->projectAssigned()->detach($deattachProjects);
        }
        if (!$deattachCompanies->isEmpty()) {
            $user->companyAssigned()->detach($deattachCompanies);
        }
        if (!$attachRoles->isEmpty()) {
            $user->roleAssigned()->attach($attachRoles);
        }
        if (!$attachProjects->isEmpty()) {
            $user->projectAssigned()->attach($attachProjects);
        }
        if (!$attachCompanies->isEmpty()) {
            $user->companyAssigned()->attach($attachCompanies);
        }


        return redirect('assign')->with('success', 'Roles,Projects and Companies updated succesfully');
    }

    public function destory()
    {
    }
}
