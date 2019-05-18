@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>Task</h1>
@stop

@section('content')

				

					<div style="padding: 20px">
						<table class="table table-hover table-bordered">
						<tr>
							<th>Nama Task</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
						@foreach($files as $file)
						@if( Session::get('project') == $file->project_id )
						<tr>
							<td>{{ $file->file }}</td>
							<td>{{ $file->created_at }}</td>
							<td>
								<form action="/project/delete_file/{{ $file->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<a href="{{ URL::to( '/public/file/' . $file->file)  }}" class="btn btn-success" style="padding-right: 10px;padding-left: 10px;">Download</a>
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form>
							</td>
						</tr>
						@endif
						@endforeach
						</table>
					</div>
					

@stop