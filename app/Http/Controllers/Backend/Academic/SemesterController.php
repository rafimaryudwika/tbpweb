<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Http\Controllers\controller;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit(semester $semester)
    { 
   
         $periodes = Semester::PERIODE_SELECT;

        return view('klp11.semesters.edit', compact(
            'semester',
            'periodes'
        ));
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Semester $semester)
    {

        $periodes = Semester::PERIODE_SELECT;
        $semesters = Semester::all();
        foreach ($semesters as $semesteres) {
            if ($semesteres->year==$request->year) {
               if ($semesteres->period==$request->period) {
                      notify('GAGAL!!', 'Tahun dan periode telah ada');
                      return redirect()->route('backend.semesters.edit', [$semester->id]);
                 }
               else{
                     $semester->update($request->only(
                    'year',
                    'period'));
                     notify('success', 'Berhasil mengedit data Semester ');
                     return redirect()->route('backend.semesters.index');
               }  
            }
        }
        $semester->update($request->only(
                    'year',
                    'period'));
                     notify('success', 'Berhasil mengedit data Semester ');
                     return redirect()->route('backend.semesters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
