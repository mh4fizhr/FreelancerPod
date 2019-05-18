@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Add Project</div>
				
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
				</div>
			</div>
		</div>		
	</div>
</div>
@endsection