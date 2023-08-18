<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company.index',compact(['companies']));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:100',
        ]);

        Company::create(array_merge(
            $attributes,
            [
                'created_by' => Auth::id(),
            ]
        ));

        return redirect('companies')->with('success','New Company added successfully');
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
