<?php

namespace App\Http\Controllers;
use App\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['role'] = Role::all();
        return view('roles.index',$data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function role_create()
    {
        return view('roles.roles_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function role_store(Request $request)
    {
        $insert = Role::insert([
            'role_name'=>$request->role_name,
            'status'=>$request->status,

        ]);
        // session()->flash('message', 'Flash message created successfully!');
        return redirect()->route('index')->with('message', 'Created successfully!');;
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
    public function role_edit($id)
    {
        $data['role_edit'] = Role::find($id);
        return view('roles.roles_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_update(Request $request, $id)
    {
        $role_update= Role::find($id);
        $role_update->role_name = $request->role_name;
        $role_update->status = $request->status;

        $role_update->save();
        return redirect()->route('index')->with(['message'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role_delete(Request $request)
    {
        $data['director'] = Role::find($request->role_id)->delete();
        return redirect()->route('index')->with(['message'=>'Deleted Successfully']);

    }

}
