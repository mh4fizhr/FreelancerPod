@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header"><center>Hasil Pencarian</center></div>
				@if (count($users) > 0)
				@foreach($users as $user)
				<div class="card-body">
					<form action="{{ url('/project/leader') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label>user_id</label>
							<input type="text" name="user_id" class="form-control" >
						</div>
						<div class="form-group">
							<label>name</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label>project_id</label>
							<input type="text" name="project_id" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			 		@endforeach
				@else 
				Data tidak ditemukan.
				@endif
			</div>
		</div>		
	</div>
</div>
@endsection