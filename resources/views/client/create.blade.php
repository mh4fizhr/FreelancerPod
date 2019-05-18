@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Add Client</div>
				
				<div class="card-body">
					<form action="{{ url('/project/add_client') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>email</label>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<label>Project</label>
							<select name="project_id" class="form-control">
								<option value="">Pilih project</option>
								@foreach($projects as $project)
								<option value="{{ $project->id }}">{{ $project->nama }}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
@endsection