<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:departments_access']);
    }

    public function index()
    {
        $departments = Department::paginate(config(
            'central.default_paginate_item'
        ));
        return view('backends.departments.index', compact('departments'));
    }

    public function create()
    {
        if(!Gate::allows('departments_manage'))
        {
            return abort(403);
        }
        $faculties = Faculty::all()->pluck('name', 'id');

        return view('backends.departments.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        if(!Gate::allows('departments_manage'))
        {
            return abort(403);
        }

        $request->validate(Department::validation_rules);

        if(Department::create($request->all())){
            notify('success', 'Berhasil menambahkan data jurusan/program Studi');
        }else{
            notify('error', 'Gagal menambahkan data jurusan/program studi');
        }
        return redirect()->route('backend.departments.index');
    }

    public function show(Department $department)
    {
        return view('backends.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        if(!Gate::allows('departments_manage'))
        {
            return abort(403);
        }

        $faculties = Faculty::all()->pluck('name', 'id');

        return view('backends.departments.edit', compact('department', 'faculties'));
    }

    public function update(Request $request, Department $department)
    {
        if(!Gate::allows('departments_manage'))
        {
            return abort(403);
        }

        $request->validate(Department::validation_rules);

        if($department->update($request->all())){
            notify('success', 'Berhasil mengubah data Jurusan/Program Studi');
        }else{
            notify('error', 'Gagal mengubah data Jurusan/Program Studi');
        }
        return redirect()->route('backend.departments.show', $department->id);
    }

    public function destroy(Department $department)
    {
        if(!Gate::allows('departments_manage'))
        {
            return abort(403);
        }

        if($department->delete())
        {
            notify('success', 'Berhasil menghapus data Jurusan/Prodi');
            return redirect()->route('backend.departments.index');
        }else{
            notify('error', 'Gagal menghapus data Jurusan/Prodi');
            return redirect()->back()->withErrors();
        }

    }
}
