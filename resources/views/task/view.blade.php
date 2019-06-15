@extends('adminlte::page')

@section('title','AdminLTE')

@section('content_header')
<h1>Task</h1>
@stop

@section('content')

		<div class="col-md-12">
			@foreach($tasks as $task)
			<div class="col-md-8">
				
					<div class="col-md-12" style="background-color: white;margin-bottom: 20px">
					<h3>Description of task</h3>
					<div class="col-md-12" style="background-color: #00ff00;height: 200px;margin-bottom: 20px;border: 1px solid;
					  padding: 20px;
					  resize: both;
					  overflow: auto;">
						{{$task->deskripsi}}
					</div>
				</div>
				
			</div>
			<div class="col-md-4">
				<div class="col-md-12" style="background-color: white;height: 277px;margin-bottom: 20px;padding: 20px">

				<h3 class="pull-right"><form action="/project/delete_task/{{ $task->id }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								
									<button type="submit" class="btn btn-danger" style="padding-right: 13px;padding-left: 13px">Delete</button>
								</form></h3>

								<h3>Details</h3>

				<h4>Judul Task 	: 
					{{$task->name}}
				</h4>

				<h4>Keterangan 	: 
					{{$task->keterangan}}
				</h4>

				<h4>Assign to 	: 
					<span style="color: red">{{$task->assign}}</span>
				</h4>

				<h4 style="color: #609040">Deadline	: 
					{{$task->deadline}}
				</h4>


			</div>
			</div>	
			@endforeach

		</div>
			
					

@stop