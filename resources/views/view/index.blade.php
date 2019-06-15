@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')

@foreach($projects as $project)
<?php
if ( $project->id  == request()->route('id')) { ?>

<h1 style="font-size: 40px">{{$project->nama}}</h1>

<?php
}
?>
@endforeach

@stop

@section('content')
<div class="col-md-12">
	<div class="col-md-8" >
			<div class="col-md-12" style="background-color: white;margin-bottom: 20px">
				<h3>Latest Update</h3>
				<div class="col-md-12" style="background-color: #00ffff;height: 200px;margin-bottom: 20px;border: 1px solid;
				  padding: 20px;
				  resize: both;
				  overflow: auto;">
					<?php $i = 0; ?>
					@foreach($latests as $latest)
					<?php if ( $i < 10) { ?>
					<h4><span style="color: red">{{$latest -> username }}</span> : {{$latest -> keterangan }} : "{{$latest->nama}}" <span class="pull-right">{{$latest -> updated_at }}</span><h4>
						<?php
						$i++;
						}
						?>
					@endforeach
				</div>
			</div>
			
			
		</div>
		<div class="col-md-4">
			<div class="col-md-12" style="background-color: white;height: 277px;margin-bottom: 20px">

				<h3>Summary<a href="/project/manage/{{ Session::get('project') }}" class="btn btn-warning pull-right" >Manage user</a></h3>

				<h4>Leader 	: 
				@foreach($projects as $project)
				{{ $project->user->name }}
				@endforeach
				</h4>

				<h4>Team 	: 
				@foreach($teams as $team)
				@if(request()->route('id') == $team->project_id)
				{{ $team->name }}
				@else
				@endif
				@endforeach
				</h4>

				<h4>Client 	: 
				@foreach($clients as $client)
				@if(request()->route('id') == $client->project_id)
				{{ $client->name }}
				@else
				@endif
				@endforeach
				</h4>


				@foreach($projects as $project)
				<?php
				if ( $project->id  == request()->route('id')) { ?>
				<h4>Status 	: <span style="color: green">{{$project->status}}</span></h4>
				<h4>Created At	: <span >{{$project->created_at}}</span></h4>

				<?php
				}
				?>
				@endforeach
				<h5></h5>
				<h3><a href="/chats" class="btn btn-info" >Forum Chat</a></h3>

			</div>
			
		</div>
</div>
<div class="col-md-12">
	<div class="col-md-6">
				<a href="/project/task/{{Session::get('project')}}" style="font-size: 20px">Task</a>
				<a href="/project/add_task" class="btn btn-primary pull-right" style="margin-bottom: 10px">Add Task</a>


					<table class="table table-striped table-hover" style="background-color: white">
						<tr>
							<th>Judul</th>
							<th>Keterangan</th>
							<th>Assign to</th>
							<th>Deadline</th>
							<th>Action</th>
						</tr>
						<?php $i = 0; ?>
						@foreach($tasks as $task)
						<?php
						
						if ( $task->project_id == request()->route('id') && $i < 5) { ?>
							<tr>
							<td><a href="/project/task/view/{{ $task->id }}" >{{ $task->name }}</a></td>
							<td>{{ $task->keterangan }}</td>
							<td style="color: red">{{ $task->assign }}</td>
							<td>{{ $task->deadline }}</td>
							<td>
								@if( Auth::user()->id == $task->user_id )
								<form action="/project/delete_task/{{ $task->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form>
								@endif

								

									

							</td>
						</tr>

						<?php
						$i++;
						}
						?>
						
						@endforeach
					</table>
			</div>
			<div class="col-md-6">
				<a href="/project/file/{{Session::get('project')}}" class="pull-left" style="font-size: 20px">File</a>
				<a href="/project/add_file" class="btn btn-success pull-right" style="margin-bottom: 10px">Add File</a>

					<table class="table table-striped table-hover" style="background-color: white">
						<tr>
							<th>File</th>
							<th>Upload at</th>
							<th>Action</th>
						</tr>
						<?php $i = 0; ?>
						@foreach($files as $file)
						<?php
						if ( $file->project_id == request()->route('id') && $i < 5) { ?>
						<tr>
							@if($file->file)
								<td><img style="height: 50px" src="{{ url('file/'.$file->file) }}"></td>
							@else
							@endif
								<td>{{ $file->created_at }}</td>
								<td>
									<form action="/project/delete_file/{{ $file->id }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<a href="{{ URL::to( '/public/file/' . $file->file)  }}" class="btn btn-success" style="padding-right: 10px;padding-left: 10px;">Download</a>
										@if( Auth::user()->id == $file->user_id )
										<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
										@endif
									</form>
										

								</td>
						</tr>

						<?php
						$i++;
						}
						?>
						
						@endforeach
					</table>
			</div>
</div>	
<div class="col-md-12" >
	<div class="col-md-12">
		
	
	<a href="/project/ta" style="font-size: 20px">Discussion</a>
				<a href="/project/add_discussion" class="btn btn-primary pull-right" style="margin-bottom: 10px">Add Discussion</a>


					<table class="table table-striped table-hover" style="background-color: white">
						<tr>
							<th>Judul</th>
							<th>Discussion</th>
							<th>participant</th>
							<th>Action</th>
						</tr>
						

						
						
						<tr>
							@foreach($participants as $participant)
							@if(Auth::user()->name == $participant->participant)
							<td>{{ $participant->name }}</td>
							<td>{{ $participant->discussion }}</td>
							<td style="color:red">{{ $participant->part }}</td>
							<td>
								@if( Auth::user()->id == $participant->user_id )
								<form action="/project/delete_discussion/{{ $participant->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form>
								@endif
							</td>
							@endif
						</tr>
						<tr>
							@if($participant->participant == 'public')
							<td>{{ $participant->name }}</td>
							<td>{{ $participant->discussion }}</td>
							<td style="color:green">{{ $participant->participant }}</td>
							<td>
								@if( Auth::user()->id == $participant->user_id )
								<form action="/project/delete_discussion/{{ $participant->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form>
								@endif
							</td>

							@endif
							@endforeach

						</tr>
						
						

						
					</table>
				</div>
</div>



@stop