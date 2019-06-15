@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>My Project</h1>
@stop

@section('content')


<div class="col-md-12" style="background-color: rgb(34, 45, 50)">
	<div class="card-header" style="color: white"><center><h3>Add Task</h3></center></div>
</div>

<div class="col-md-12" style="background-color: white;padding-right: 30px;padding-left: 30px;padding-bottom: 30px">
	
        
				<br>
				<div>
					@foreach($errors->all() as $message)
					{{$message}}
					@endforeach
				</div>
				<div>

					<form action="{{ url('/project/add_discussion') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control">

							<input type="hidden" name="project_id" value="{{Session::get('project')}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<input type="hidden" name="username" value="{{Auth::user()->name}}">
							<input type="hidden" name="keterangan" value="Telah menambahkan Discussion">
						</div>
						<div class="form-group">
							<label>Discussion</label>
							<input type="text" name="discussion" class="form-control">
						</div>
						<div class="form-group">
							<label>Attachment</label>
							<input type="file" name="file[]" multiple>
						</div>
						<div class="form-group">
							<label>Participant</label>
							<br>
		                      	<input id="showen" type="radio" name="participant[]" value="public"  data-toggle="collapse" data-target="#hide" checked><label>Public</label>
		                      	<input id="hidden" type="radio" name="participant[]" value="" data-toggle="collapse" data-target="#hide"><label>Khusus</label>
						</div>
						<div id="hide" class="panel-collapse collapse">							
							@foreach($users as $user)
							<input type="checkbox" name="participant[]" value="{{$user->name}}"><label>{{$user->name}}</label>
							@endforeach
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
</div>

				

@stop