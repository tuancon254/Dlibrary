<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $class;
    public function __construct(Clas $class)
    {
        $this->class = $class;
    }
    public function index()
    {
        $data = DB::table('class')->join('semester','class.sem_id','=','semester.sem_id')->orderBy('class_id','asc')->paginate(7);
        $d = $this->class->all();
        return view('admin.class.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        return view('admin.class.create',compact('semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->class->create([
            'class_name' => $request->class_name,
            'sem_id' => $request->semester_id,
        ]);
        return redirect()->route('class.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show($id) 
    {
        $class = $this->class->find($id);
        $student = $class->students()->orderBy('student_id', 'desc')->paginate(7);
        $semester = $class->semester->sem_name;
        // dd($semester);
        return view('admin.class.student_list',compact(['student','id','class','semester']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = $this->class->find($id);
        $semester = Semester::all();
        return view('admin.class.edit',compact('semester','class'));
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
        $class = $this->class->find($id);
        $class->update([
            'class_name' => $request->class_name,
            'sem_id' => $request->semester_id,
        ]);
        return redirect()->route('class.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = $this->class->find($id);
        $class->delete();
        return redirect()->route('class.list');
    }
}
