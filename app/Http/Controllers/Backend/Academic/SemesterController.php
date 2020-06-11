<?php
 
namespace App\Http\Controllers\Backend\Academic;



use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Semester;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;


class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use UploadFileTrait;
    public function __construct()
    {
        $this->middleware(['permission:students_access']);
    }
    public function index()
    {
        $semesters = Semester::all();
        return view('klp11.semesters.index', ['semesters'=>$semesters]);
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
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
    
    public function create()
    {
        $aktifs = Semester::AKTIF_SELECT;
        $periodes = Semester::PERIODE_SELECT;

        return view('klp11.semesters.create', compact(
            'aktifs',
            'aktifs',
            'periodes',
            'periodes'
        ));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aktifs = Semester::AKTIF_SELECT;
        $periodes = Semester::PERIODE_SELECT;
        $semesters = Semester::all();
        foreach ($semesters as $semester) {
            if ($semester->year==$request->year) {
               if ($semester->period==$request->period) {
                    notify('GAGAL', 'Tahun dan periode telah ada');
                     return redirect()->route('backend.semesters.create'); 
                 }  
            }
        }
        Semester::create([
                    'year' => $request->year,
                    'period' => $request->period,
                    'aktif' =>  $request->aktif,
                ]);
        notify('success', 'Data telah diinputkan1');
        return redirect()->route('backend.semesters.index');
        
    }
    //public function activate(Request $request, Semester $semester)
    //{
//
    //        $aktifkan = 1;
    //        $nonaktifkan=0;
    //        $semesters = Semester::all();
    //        $semesters = Semester::where($request->id)
    //        ->update([
    //                'aktif'=>$nonaktifkan
    //               ]); 
    //        $semesters = Semester::where('id',$semester->id)
    //        ->update([
    //                'aktif'=>$aktifkan
    //                ]);
    //                 notify('success', 'Berhasil mengedit data Semester ');
    //                 return redirect()->route('backend.semesters.index'); 
    //}

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
    //  public function activate(Request $request, Semester $semester)
    // {

    //         $aktifkan = 1;
    //         $nonaktifkan=0;
    //         $semesters = Semester::all();
    //         $semesters = Semester::where($request->id)
    //         ->update([
    //                 'aktif'=>$nonaktifkan
    //                 ]); 
    //         $semesters = Semester::where('id',$semester->id)
    //         ->update([
    //                 'aktif'=>$aktifkan
    //                 ]);
    //                  notify('success', 'Berhasil mengedit data Semester ');
    //                  return redirect()->route('backend.semesters.index'); 
    // }

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