<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\File;
use App\Project;
use App\Latest;
use Session;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::all();
        return view('file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $projects = Project::all();
        return view('file.create', compact('projects'));
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
        $file = new File();
        $latest = new Latest();
        $request->validate([
            'file' => 'mimes:jpeg,jpg,png,docx,doc,ppt,pptx,pdf,txt',
            'project_id' => 'required',
            'user_id' => 'required',
            'username' => 'required',
            'keterangan' => 'required'
        ]);

        $tempat_upload = public_path('/file');
        $document = $request->file('file');
        $ext = $document->getClientOriginalExtension();
        $filename = rand(11111, 99999) . "." . $ext;
        $document->move($tempat_upload,$filename);

        $file->project_id = $request->project_id;
        $file->file = $filename;

        $latest->user_id = $request->user_id;
        $latest->username = $request->username;
        $latest->keterangan = $request->keterangan;
        $latest->nama = $filename;

        $file->save();
        $latest->save();

        return redirect('/project/view/'.Session::get('project'));
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
        $file = File::find($id);
        $file->delete();

        return redirect('/project/view/'.Session::get('project'));
    }
}
