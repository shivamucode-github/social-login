<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('user')->get();
        return view('roles.index',compact(['roles']));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => "required|max:100|min:3",
        ]);

        Role::create(array_merge(
            $attributes,
            [
                'created_by' => Auth::id(),
            ]
        ));

        return redirect('roles')->with('success','New role added successfully');
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
