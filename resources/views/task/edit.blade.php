@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Edit Task</div>
				
				<div class="card-body">
					<form action="{{ url('/project/view/edit_task/' . $task->id) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>name</label>
							<input type="text" name="name" value="{{ $task->name }}" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
@endsection