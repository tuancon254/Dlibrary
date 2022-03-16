<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    public function __construct(Users $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $id = Auth::user()->id;
        $user = $this->user->find($id);
        $user->students()->first();
        return view('admin.profiles.showProfile',compact('user'));
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
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc|max:255',
            'name' => 'required',
            'phone' => 'required|numeric',
        ]);
        $id = Auth::user()->id;
        $user = $this->user->find($id);
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone_number' => $request->phone,
        ]);

        return redirect()->route('profile');
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

    public function showResetPasswordForm()
    {
        return view('admin.profiles.resetPassword');
    }

    public function updatePassword(Request $request)
    {
        $user = $this->user->find(auth()->user()->id);
        $request->validate([
            'new_password' => 'required|min:8',
            'rpt_new_password' => 'required|min:8'
        ]);
        $password = Hash::make($request->new_password);
        $user->update([
            'password' => $password,
        ]);
        return redirect()->route('profile');
    }
}
