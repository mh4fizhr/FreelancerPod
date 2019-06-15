<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Discussion;
use App\Participant;
use App\Fileparticipant;
use App\File;
use App\Latest;
use DB;
use Session;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('discussion.create',compact('users'));
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
        $discussion = new Discussion();
        $latest = new Latest();
        
        foreach($request->participant as $name){
            $participant = new Participant();
            $participant->discussion = $request->discussion;
            $participant->name = $name;
            $participant->save();
        }


        foreach($request->file as $file){

            $filename = $file->getClientOriginalName();
            $file->move(public_path().'/file', $filename);

            $file = new Fileparticipant();
            $file->discussion = $request->discussion;
            $file->file = $filename;
            $file->save();

            $files = new File();
            $files->file = $filename;
            $files->project_id = $request->project_id;
            $files->user_id = $request->user_id;
            $files->save();


            /*$filemode = new Fileparticipant();
            $tempat_upload = $name->public_path('/file');
            $name = $request->file('file');
            $ext = $name->getClientOriginalExtension();
            $filename = $name->getClientOriginalName();
            $name->move($tempat_upload,$filename);

            
            $filemode->discussion = $request->discussion;
            $filemode->file = $filename;
            $filemode->save();*/
        }


        $request->validate([
            'judul' => 'required',
            'discussion' => 'required',
            'project_id' => 'required',
            'participant' => 'required',
            'keterangan' => 'required',
            'username' => 'required',
            'user_id' => 'required'
        ]);


        /*$tempat_upload = public_path('/file');
        $document = $request->file('file');
        $ext = $document->getClientOriginalExtension();
        $filename = $document->getClientOriginalName();
        $document->move($tempat_upload,$filename);*/
        
        $discussion->name = $request->judul;
        $discussion->discussion = $request->discussion;
        //$discussion->file = implode(" ",$filename);
        $discussion->participant = implode(" ", $request->participant);
        $discussion->user_id = $request->user_id;
        $discussion->project_id = $request->project_id;

        $discussion->save();

        //LATEST UPDATE
        $latest->user_id = $request->user_id;
        $latest->username = $request->username;
        $latest->keterangan = $request->keterangan;
        $latest->nama = $request->discussion;

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
    public function destroy($discussion)
    {
        //
        $discussion = Discussion::find($discussion);
        $discussion->delete();


        return redirect('/project/view/'.Session::get('project'));
    }
}
