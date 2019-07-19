<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index')->with('users', User::all());



    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        if (Auth::user()->id == $id) {


            return redirect()->route('admin.users.index')->with('warning', 'cannot self-edit');

        }

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' =>Role::all()]);


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
        if (Auth::user()->id == $id) {


            return redirect()->route('admin.users.index')->with('warning', 'cannot self-edit');

        }




        $user= User::find($id);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Auth::user()->id == $id) {


            return redirect()->route('admin.users.index')->with('warning', 'cannot self-delete');

        }

        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'successfully deleted');;





    }
}
