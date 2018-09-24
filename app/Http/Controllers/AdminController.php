<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view("userlist")->with('data', $data);
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
        $input = $request;
        if($id == Auth::user()->id)
            return redirect()->back()->with('warningMsg', 'You may not update your own account from here.');
        else
        {
            $user = User::find($id);
            if(isset($input['role']))
            $user->role = $input['role'];
            else if(isset($input['isActive']))
            $user->isActive = $input['isActive'];
            else if(isset($input['password']))
            $user->password = bcrypt($input['password']);
            $user->save();
            return redirect()->back()->with('successMsg', 'User Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == Auth::user()->id)
            return redirect()->back()->with('warningMsg', 'You may not delete your own account.');
        else
        {
            if(User::destroy($id))
                return redirect()->back()->with('successMsg', 'User deleted Successfully');
            else
                return redirect()->back()->withErrors('Could not delete User. Please try again later.');
        }
    }

}
