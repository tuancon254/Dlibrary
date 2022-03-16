<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\role_permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $role;
    protected $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {
        $data = $this->role->all();
        return view('admin.role.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id','==','0')->get();
        // dd($permissionParent);
        return view('admin.role.create',compact(['permissionParent']));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required:unique:roles,role_name'
        ]);
        $role = $this->role;
        $role->role_name = $request->role;
        $role->save();
        $role->permissions()->attach($request->per_id,['created_at'=> now(),'updated_at' =>now()]);
        return redirect()->route('role.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id','==','0')->get();
        $role = $this->role->find($id);
        $active = $role->permissions;
        return view('admin.role.edit', compact(['permissionParent','role','active']));
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
        $role = $this->role->find($id);
        $role->role_name = $request->role;
        $role->save();
        $role->permissions()->syncWithPivotValues($request->per_id, ['updated_at' => now()]);
        return redirect()->route('role.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = $this->role->find($id);
        $role->permissions()->detach();
        $role->delete();
        return redirect()->route('role.list');
    }
}
