<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::orderBy('year','asc')->paginate(5);
        $semesters = Semester::all();
        return view('klp11.semesters.index', ['semesters'=>$semesters]);
    }
    
    public function activate(Request $request, Semester $semester)
    {

            $aktifkan = 1;
            $nonaktifkan=0;
            $semesters = Semester::all();
            $semesters = Semester::where($request->id)
            ->update([
                    'aktif'=>$nonaktifkan
                    ]); 
            $semesters = Semester::where('id',$semester->id)
            ->update([
                    'aktif'=>$aktifkan
                    ]);
                     notify('success', 'Berhasil mengedit data Semester ');
                     return redirect()->route('backend.semesters.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semesters = Semester::find($id);
        $semesters->delete();
        return redirect()->route('backend.semesters.index');
    }
}
