<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use App\Cari;
use App\User;
use App\Leader;
use Session;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $user = User::all();
    $search = \Request::get('cari');  
    $users = User::where('email','=',$search)->paginate(20);
    return view('leader.index',compact('users'))->withuser($user);

    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $request->validate([
            'cari' => 'required'
        ]);
        $users = User::where('email', '=', $request)->get();
        return view('leader.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('leader.create');
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
        $leader = new Leader();
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'project_id' => 'required'
        ]);

        $leader->user_id = $request->user_id;
        $leader->name = $request->name;
        $leader->project_id = $request->project_id;

        $leader->save();


        return redirect('/project/manage/'.Session::get('project'));
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
        //
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
        $leader = Leader::find($id);
        $leader->delete();

        return redirect('/project/manage/'.Session::get('project'));
    }
}
