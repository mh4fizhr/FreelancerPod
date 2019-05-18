@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>My Project</h1>
@stop

@section('content')

<div class="col-md-12" style="background-color: white;padding:20px">

		
					<form action="{{ url('/project/client')}}" action="GET">
						<div class="form-group">
							<label for="cari">Cari email user</label>
							<input type="email" class="form-control" id="cari" name="cari" placeholder="email">
						</div>
						<input class="btn btn-primary col-md-12" type="submit" value="Cari">
					</form>
				
</div>				
				

<br>
<div class="col-md-12" style="background-color: white;margin-top: 20px;padding: 20px">
	<div class="card-header"><center><h3>Hasil Pencarian</h3></center></div>
				@if (count($users) > 0)
				@foreach($users as $user)
				<div class="card-body">
					<form action="{{ url('/project/client') }}" method="post">
						{{ csrf_field() }}

							<input type="hidden" name="user_id" class="form-control" value="{{ $user->id }}" >


							<input type="hidden" name="project_id" class="form-control" value="{{Session::get('project')}}" >

						<div class="form-group">
							<label>name</label>
							<input type="text" name="name" class="form-control" value="{{ $user->name }}" >
						</div>
						<div class="form-group">
							<label>email</label>
							<input type="text" name="email" class="form-control" value="{{ $user->email }}" >
						</div>
						<button type="submit" class="btn btn-danger">Add Leader</button>
					</form>

					
				</div>
			 		@endforeach
				@else 
				<center>
				<span style="text-align: center;">Data tidak ditemukan</span>
				</center>
				@endif
</div>

				

@stop