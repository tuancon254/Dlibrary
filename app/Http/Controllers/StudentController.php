<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Students;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    private $student;
    private $user;
    public function __construct(Users $user, Students $student)
    {
        $this->user = $user;
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $student = $this->student->latest()->paginate(7);
        // $class = Clas::all();
        // return view('admin.user.student_list', compact('student', 'class'));
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
        $students = $this->student->find($id);
        $user = $students->user;
        $action = $this->user->find(auth()->user()->id)->roles()->first()->role_id;
        $userrole = $user->roles()->first();
        $class = Clas::find($students->class_id);
        return view('admin.class.student_show', compact(['user', 'userrole', 'students', 'class', 'action']));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = DB::table('class')->get();
        $user = $this->student->find($id)->user()->first();
        // dd($user);
        $userrole = $user->roles()->first();
        $students = $this->student->find($id);
        return view('admin.class.student_edit', compact(['user', 'userrole', 'students', 'class', 'id']));
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
        $password = Hash::make($request->username);
        $user = $this->user->find($id);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'phone_number' => $request->phone,
            'password' => $password,
        ]);
        $user->students()->update([
            'student_id' => $request->scode,
            'class_id' => $request->class_id,
            'first_name' => $request->fname,
            'last_name' => $request->lname,
        ]);
        return redirect()->route('students.show', ['id' => $request->scode]);
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
