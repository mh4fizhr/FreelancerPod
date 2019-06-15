<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\Latest;
use App\User;
use App\Client;
use App\Team;
use DB;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $projects = Project::all();
        $users = User::all();
        $clients = Client::all();
        $teams = Team::all();
        return view('task.create', compact('projects','users','clients','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $task = new Task();
        $latest = new Latest();
        $request->validate([
            'name' => 'required',
            'ket' => 'required',
            'assign' => 'required',
            'project_id' => 'required',
            'deadline' => 'required',
            'user_id' => 'required',
            'username' => 'required',
            'deskripsi' => 'required',
            'keterangan' => 'required'
        ]);

        $task->name = $request->name;
        $task->keterangan = $request->ket;
        $task->deskripsi = $request->deskripsi;
        $task->assign = $request->assign;
        $task->project_id = $request->project_id;
        $task->user_id = $request->user_id;
        $task->deadline = $request->deadline;
        
        $latest->user_id = $request->user_id;
        $latest->username = $request->username;
        $latest->keterangan = $request->keterangan;
        $latest->nama = $request->name;
        
        $task->save();
        $latest->save();

        return redirect('/project/view/'.Session::get('project'));

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
    public function view($id)
    {
        //
        $tasks = DB::table('tasks')
                ->where('id','=',$id)
                ->get();
        //$tasks = Task::find($id);
        return view('task.view',compact('tasks'));
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
        $task = Task::find($id);
        return view('task.edit',compact('task'));
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
        $request->validate([
            'name' => 'required'
        ]);

        $task = Task::find($id);
        $task->name = $request->name;

        $task->save();


        return redirect('/project/view/'.$id);
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
        $task = Task::find($id);
        $task->delete();

        return redirect('/project/view/'.Session::get('project'));
    }
}
