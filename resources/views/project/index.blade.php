@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>My Project</h1>
@stop

@section('content')

					
					<div><a href="/project/add_project" class="btn btn-danger col-md-12" style="margin-bottom: 20px;height: 45px;padding: 12px ">Add Project</a></div>

					<div style="padding: 20px">
						<table class="table table-hover table-bordered">
						<tr>
							<th>Kode Project</th>
							<th>Nama Project</th>
							<th>Tanggal dibuat</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						@foreach($projects as $project)
						@if( Auth::user()->id == $project->user_id )
						<tr>
							<td>{{ $project->kode }}</td>
							<td>{{ $project->nama }}</td>
							<td>{{ $project->created_at }}</td>
							<th class="text-success">{{ $project->status }}</th>
							<td>
								<form action="/project/delete/{{ $project->id }}" method="post">
									<a href="/project/view/{{ $project->id }}" class="btn btn-primary" style="padding-right: 20px;padding-left: 20px;">View</a>
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger" style="padding-right: 15px;padding-left: 15px">Delete</button>
								</form>
							</td>
						</tr>
						@endif
						@endforeach
						@foreach($leaders as $leader)
						@if(Auth::user()->id == $leader->user_id)
							<td>{{ $leader->project->kode }}</td>
							<td>{{ $leader->project->nama }}</td>
							<td>{{ $leader->project->created_at }}</td>
							<th class="text-success">{{ $leader->project->status }}</th>
							<td>
								<form action="/project/delete/{{ $project->id }}" method="post">
									<a href="/project/view/{{ $project->id }}" class="btn btn-primary" style="padding-right: 20px;padding-left: 20px;">View</a>
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger" style="padding-right: 15px;padding-left: 15px">Delete</button>
								</form>
							</td>
							@endif
						@endforeach
						@foreach($clients as $client)
						@if(Auth::user()->id == $client->user_id)
							<td>{{ $client->project->kode }}</td>
							<td>{{ $client->project->nama }}</td>
							<td>{{ $client->project->created_at }}</td>
							<th class="text-success">{{ $client->project->status }}</th>
							<td>
								<form action="/project/delete/{{ $project->id }}" method="post">
									<a href="/project/view/{{ $project->id }}" class="btn btn-primary" style="padding-right: 20px;padding-left: 20px;">View</a>
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger" style="padding-right: 15px;padding-left: 15px">Delete</button>
								</form>
							</td>
							@endif
						@endforeach
						@foreach($teams as $team)
						@if(Auth::user()->id == $team->user_id)
							<td>{{ $team->project->kode }}</td>
							<td>{{ $team->project->nama }}</td>
							<td>{{ $team->project->created_at }}</td>
							<th class="text-success">{{ $team->project->status }}</th>
							<td>
								<form action="/project/delete/{{ $project->id }}" method="post">
									<a href="/project/view/{{ $project->id }}" class="btn btn-primary" style="padding-right: 20px;padding-left: 20px;">View</a>
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger" style="padding-right: 15px;padding-left: 15px">Delete</button>
								</form>
							</td>
							@endif
						@endforeach
						
						
						</table>
					</div>

					

@stop