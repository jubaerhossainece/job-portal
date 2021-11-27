@extends('layouts.admin.app')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-header page-header">
				<h4><strong>Applicants List</strong></h4>
				<a href="{{route('admin.jobs.index')}}" class="btn btn-light">Back to jobs</a>
			</div>
			<div class="card-body">
				@foreach($job->users as $user)
				<div class="row border-bottom mt-4">
					<div class="col-md-12">
						<div class="mb-4">
							<h4><strong>Name</strong></h4>
							<h5>{{$user->name}}</h5>
						</div>

						<div class="mb-4">
							<h4><strong>Email</strong></h4>
							<h5>{{$user->email}}</h5>
						</div>

						<div class="mb-4">
							<h4><strong>Current Company</strong></h4>
							<h5>{{$user->current_company}}</h5>
						</div>


						<div class="mb-4">
							<h4><strong>Position</strong></h4>
							<h5>{{$user->position}}</h5>
						</div>
						<div class="mb-4">
						<a href="{{route('admin.job.applicant.single',['job_id' => $job->id, 'user_id' => $user->id])}}" class="btn btn-success">View detail</a>							
						</div>
					</div>
				</div>
					@endforeach

			</div>
		</div>
	</div>
</div>

@endsection