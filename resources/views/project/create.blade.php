@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>Add Project</h1>
@stop

@section('content')
				
				<div class="card-body">
					<form action="{{ url('/project/add_project') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Kode Project</label>
							<input type="text" name="kode" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama Project</label>
							<input type="text" name="nama" class="form-control">
						</div>
						<input type="hidden" name="status" value="On Process">
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>

<<<<<<< HEAD
@stop
=======
@stop
>>>>>>> 61f7e2f6bcf40c32baec12ec8ecac17c5828119b
