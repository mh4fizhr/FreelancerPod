<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\Leader;
use App\Team;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaders = Leader::all();
        $clients = CLient::all();
        $projects = Project::all();
        $teams = Team::all();
        return view('project.index', compact('projects','clients','leaders','teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('project.create');
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
        $project = new Project();
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        $project->kode = $request->kode;
        $project->nama = $request->nama;
        $project->status = $request->status;
        $project->user_id = $request->user_id;

        $project->save();

        return redirect('project');
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
        $project = Project::find($id);
        $project->delete();

        return redirect('/project');
    }
}
