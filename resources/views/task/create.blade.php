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
				<div class="card-body">
					<form action="{{ url('/project/add_task') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control">
							<input type="hidden" name="project_id" value="{{Session::get('project')}}">
							<input type="hidden" name="assign" value="{{Session::get('project')}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<input type="hidden" name="username" value="{{Auth::user()->name}}">
							<input type="hidden" name="keterangan" value="Telah menambahkan TASK">
						</div>
						<div class="form-group">
							<label>keterangan</label>
							<input type="text" name="ket" class="form-control">
						</div>
						<div class="form-group">
							<label>Assign To</label>
							<select name="assign" class="form-control">
								<option value="">Pilih User</option>
								@foreach($users as $user)
								<option value="{{$user->name}}">{{$user->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Deadline</label>
							<input type="date" name="deadline" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
</div>

				

@stop