@extends('layouts.user.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

@push('css')
	<style>
		.card-footer:last-child{
			background-color: white;
			border-top: none;
		}
	</style>
@endpush
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header page-header">
				<h4></h4>
				<a href="{{route('jobs.index')}}" class="btn btn-light">Go Back</a>
			</div>			

			<div class="card-body">
				<div class="mb-4 row">
					<div class="col-md-8">
						<h4><strong>Job Type</strong></h4>
						<h5>{{$job->jobType->title}}</h5>
					</div>
					<div class="col-md-4">
								<span>posted on {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span>

					</div>
				</div>

				<div class="mb-4">
					<h4><strong>Job Title</strong></h4>
					<h5>{{$job->title}}</h5>
				</div>

				<div class="mb-4">
					<h4><strong>Job Description</strong></h4>
					<h5>{{$job->description}}</h5>
				</div>

				<div class="">
					<h4><strong>Thumbnail</strong></h4>
					@if($job->thumbnail)
					<img class="img-fluid" src="{{asset('/storage/admin/images/jobs/'.$job->thumbnail)}}">
					@else
					<img class="img-fluid" src="{{asset('/assets/images/job.jpg')}}">
					@endif

				</div>

			</div>
			<div class="card-body">
				<button onclick="applyJob({{$job->id}})" id="job-id-{{$job->id}}" class="btn btn-success text-white">
					Apply now
				</button>
			</div>
		</div>
	</div>
</div>

@push('script')
<script>
	function applyJob(job_id){
		event.preventDefault();
		$.ajaxSetup({
        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
		$.ajax({
			type:"post",
			url:"/job/apply",
			data: { 'job_id' : job_id },
			cache:false,
			success: function(data){
				console.log(data);
				if(data){
					$('#job-id-'+job_id).html('Applied');
					$('#job-id-'+job_id).removeClass("btn-success").addClass("btn-light"); 
				}else{
					$('#job-id-'+job_id).html('Apply');
					$('#job-id-'+job_id).removeClass("btn-light").addClass("btn-success");

				}
			}
		})
	}
</script>
@endpush
@endsection