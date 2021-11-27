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
				<div class="mb-5 row">
					<div class="col-md-8">
						<h4><strong>Job Type</strong></h4>
						<h5>{{$job->jobType->title}}</h5>
					</div>
					<div class="col-md-4">
						<h4>Active Status</h4><small>(Click to activate/deactivate)</small>
						<br>
						@if($job->is_active)

				      		<button onclick="changeStatus({{$job->id}})" id="job-status-{{$job->id}}" class="btn-sm btn badge badge-success text-white">
								Active
							</button>
						@else
							<button onclick="changeStatus({{$job->id}})" id="job-status-{{$job->id}}" class="btn-sm btn badge badge-warning text-white">
								Deactive
							</button>
                        @endif
					</div>
				</div>

				<div class="mb-5">
					<h4><strong>Job Title</strong></h4>
					<h5>{{$job->title}}</h5>
				</div>

				<div class="mb-5">
					<h4><strong>Job Description</strong></h4>
					<h5>{{$job->description}}</h5>
				</div>

				<div class="mb-5">
					<h4><strong>Thumbnail</strong></h4>
					@if($job->thumbnail)
					<img class="img-fluid" src="{{asset('/storage/admin/images/jobs/'.$job->thumbnail)}}">
					@else
					<img class="img-fluid" src="{{asset('/assets/images/job.jpg')}}">
					@endif

				</div>
				      	<a href="{{route('admin.jobs.edit', $job->id)}}" class="btn btn-primary" data-tooltip="tooltip" data-placement="bottom" title="Edit information">Edit Job
						</a>
				      <td><a href="{{route('admin.job.applicant.list', $job->id)}}" class="btn btn-info">Applicant list</a></td>

			</div>
		</div>
	</div>
</div>

@push('script')
<script>
	function changeStatus(id){
		event.preventDefault();
		$.ajax({
			type:"get",
			url:"/admin/job/status-change/"+id,
			cache:false,
			success: function(data){
				console.log(data.status);
				if(data.status){
					$('#job-status-'+id).html('Active');
					$('#job-status-'+id).removeClass("badge-warning").addClass("badge-success"); 
				}else{
					$('#job-status-'+id).html('Deactive');
					$('#job-status-'+id).removeClass("badge-success").addClass("badge-warning");

				}
			}
		})
	}
</script>
@endpush
@endsection