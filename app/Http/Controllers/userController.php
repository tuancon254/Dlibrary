<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    private $user;
    public function __construct(Users $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = $this->user->orderBy('created_at', 'asc')->paginate(7);
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $class = DB::table('class')->get();
        $roles = DB::table('roles')->get();
        return view('admin.user.create', compact(['roles', 'class']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->role_id == 4) {
            $request->validate([
                'email' => 'required|email:rfc|unique:users|max:255',
                'name' => 'required',
                'username' => 'required|unique:users|max:255',
                'phone' => 'required|numeric',
                'scode' => 'required|unique:students,student_id|numeric',
                'fname' => 'required',
                'lname' => 'required',
                'class_id' => 'required',
            ]);
        } else {
            $request->validate([
                'email' => 'required|email:rfc|unique:users|max:255',
                'name' => 'required',
                'username' => 'required|unique:users|max:255',
                'phone' => 'required|numeric',
            ]);
        }
        $password = Hash::make($request->username);
        $user = $this->user->create([
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'phone_number' => $request->phone,
            'password' => $password,
        ]);
        $user->roles()->attach($request->role_id, ['created_at' => now(), 'updated_at' => now()]);
        if ($request->role_id == 4) {
            $user->students()->create([
                'student_id' => $request->scode,
                'class_id' => $request->class_id,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
            ]);
        }
        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);
        $userrole = $user->roles()->first();
        $students = $user->students()->first();
        $action = $this->user->find(auth()->user()->id)->roles()->first()->role_id;
        if (!is_null($students)) {
            $class = Clas::find($students->class_id);
            return view('admin.user.show', compact(['user', 'userrole', 'students', 'class','action']));
        }
        return view('admin.user.show', compact(['user', 'userrole','action']));
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
        $user = $this->user->find($id);
        $userrole = $user->roles()->first();
        $students = $user->students()->first();
        if (!is_null($students)) {
            return view('admin.user.edit', compact(['user', 'userrole', 'students', 'class']));
        } else {
            return view('admin.user.edit', compact(['user', 'userrole', 'class']));
        }
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
        if (!is_null($request->scode)) {
            $user->students()->update([
                'student_id' => $request->scode,
                'class_id' => $request->class_id,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
            ]);
        }
        return redirect()->route('user.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->roles()->detach();
        $user->students()->delete();
        $user->delete();
        return redirect()->route('user.list');
    }

    public function role()
    {
        $users = DB::table('users')->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->join('roles', 'user_role.role_id', '=', 'roles.role_id')
            ->paginate(7);
        return view('admin.user.userbyrole', compact('users'));
    }

    public function editrole($id)
    {
        $roles = DB::table('roles')->get();
        $user = $this->user->find($id);
        $userrole = $user->roles()->first();
        return view('admin.user.edit_role', compact(['roles', 'user', 'userrole']));
    }

    public function updaterole(Request $request, $id)
    {
        $user = $this->user->find($id);
        $user->roles()->syncWithPivotValues($request->role_id, ['updated_at' => now()]);
        return redirect()->route('user.role');
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $users = DB::table('users')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(7);
            if ($users) {
                foreach ($users as $user) {
                    $output .= '
                                    <tr>
                                        <th>' . $user->id . '</th>
                                        <td>' . $user->name . '</td>
                                        <td>' . $user->phone_number . '</td>
                                        <td>' . $user->email . '</td>
                                        <td class="text-center">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <a href="' . route('user.edit', ['id' => $user->id]) . '"
                                                    style="margin-right:5px" class="btn btn-primary btn-sm">Update</a>
                                                <form method="DELETE"
                                                    action="' . route('user.delete', ['id' => $user->id]) . '">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-flat delete"
                                                        data-toggle="tooltip" title="Delete">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                    ';
                }
            }

            return Response($output);
        }
    }


    // public function showResetPasswordForm()
    // {
    //     return view('admin.profiles.resetPassword');
    // }

    // public function updatePassword(Request $request)
    // {
    //     $user = $this->user->find(auth()->user()->id);
    //     $request->validate([
    //         'current_password' => 'bail|required|current_password:web',
    //         'new_password' => 'required|min:8',
    //         'rpt_new_password' => 'required|min:8'
    //     ]);
    //     $password = Hash::make($request->new_password);
    //     $user->update([
    //         'password' => $password,
    //         'updated_at' => now()
    //     ]);
    //     return redirect()->route('user.profile');
    // }
}
