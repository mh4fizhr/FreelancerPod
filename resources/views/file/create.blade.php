@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>My Project</h1>
@stop

@section('content')

<div class="col-md-12" style="background-color: rgb(34, 45, 50)">
	<div class="card-header" style="color: white"><center><h3>Add File</h3></center></div>
</div>
		
		<div class="col-md-12" style="background-color: white;padding: 25px">		
				<div class="card-body">
					<form action="{{ url('/project/add_file') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>File</label>
							<input type="file" name="file">
							<input type="hidden" name="project_id" value="{{Session::get('project')}}">
							
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<input type="hidden" name="username" value="{{Auth::user()->name}}">
							<input type="hidden" name="keterangan" value="Telah menambahkan FILE">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
@stop