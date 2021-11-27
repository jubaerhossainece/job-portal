@extends('layouts.admin.app')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header page-header">
				<h4></h4>
				<a href="{{route('admin.jobs.index')}}" class="btn btn-light">Go Back</a>
			</div>			

			<div class="card-body">
				<div class="mb-4">
					<h4><strong>Name</strong></h4>
					<h5>{{$user->name}}</h5>
				</div>

				<div class="mb-4">
					<h4><strong>Email</strong></h4>
					<h5>{{$user->email}}</h5>
				</div>


				<div class="mb-4">
					<h4><strong>University</strong></h4>
					<h5>{{$user->university}}</h5>
				</div>


				<div class="mb-4">
					<h4><strong>Department</strong></h4>
					<h5>{{$user->department}}</h5>
				</div>

				<div class="mb-4">
					<h4><strong>Current Company</strong></h4>
					<h5>{{$user->current_company}}</h5>
				</div>


				<div class="mb-4">
					<h4><strong>Position</strong></h4>
					<h5>{{$user->position}}</h5>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection