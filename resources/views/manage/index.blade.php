@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>My Project</h1>
@stop

@section('content')

			<div class="col-md-12">
				
				<div class="col-md-6">
					<div><a href="/project/client" class="btn btn-success col-md-12" style="margin-bottom: 20px;height: 45px;padding: 12px ">Add Client</a></div>

					<div style="padding: 20px">
						<table class="table table-hover table-bordered">
						<tr>
							<th>Nama</th>
							<th>Action</th>
						</tr>
						@foreach($clients as $client)
						@if( Session::get('project') == $client->project_id)
						<tr>
							<td>{{ $client->name }}</td>
							<td>
									<form action="/project/manage/client/{{ $client->id }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-success" style="padding-right: 13px;padding-left: 13px">Delete</button>
									</form>
							</td>
						</tr>
						@endif
						@endforeach
						</table>
					</div>
				</div>

				<div class="col-md-6">
					<div><a href="/project/team" class="btn btn-info col-md-12" style="margin-bottom: 20px;height: 45px;padding: 12px ">Add Team</a></div>

					<div style="padding: 20px">
						<table class="table table-hover table-bordered">
						<tr>
							<th>Nama</th>
							<th>Action</th>
						</tr>
						@foreach($teams as $team)
						@if( Session::get('project') == $team->project_id)
						<tr>
							<td>{{ $team->name }}</td>
							<td>
									<form action="/project/manage/team/{{ $team->id }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-info" style="padding-right: 13px;padding-left: 13px">Delete</button>
									</form>
							</td>
						</tr>
						@endif
						@endforeach
						</table>
					</div>
				</div>
			</div>
					

@stop