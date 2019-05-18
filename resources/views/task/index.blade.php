@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>Task</h1>
@stop

@section('content')

				

					<div style="padding: 20px">
						<table class="table table-hover table-bordered">
						<tr>
							<th>Judul</th>
							<th>Keterangan</th>
							<th>Assign to</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
						@foreach($tasks as $task)
						@if( Session::get('project') == $task->project_id )
						<tr>
							<td>{{ $task->name }}</td>
							<td>{{ $task->keterangan }}</td>
							<td>{{ $task->assign }}</td>
							<td>{{ $task->deadline }}</td>
							<td>
								<form action="/project/delete_task/{{ $task->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<a href="/project/view/edit_task/{{ $task->id }}" class="btn btn-primary" style="padding-right: 20px;padding-left: 20px;">Edit</a>
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form>
							</td>
						</tr>
						@endif
						@endforeach
						</table>
					</div>
					

@stop