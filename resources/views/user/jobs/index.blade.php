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
				<h4><strong>Job board</strong></h4>
			</div>
			<div class="card-body">		        
				@foreach($jobs as $job) 

				<div class="row border-bottom mb-4">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4>{{$job->title}}</h4><span class="text-primary">{{$job->jobType->title}}</span>
								
							</div>
							<div class="card-body">
								<h6>{{$job->description}}</h6>
							</div>
							<diiv class="card-footer">
								<a href="{{route('jobs.show', $job->id)}}" class="btn btn-primary">Show detail</a>
								
								<button onclick="applyJob({{$job->id}})" id="job-id-{{$job->id}}" class="btn btn-success text-white">
									Apply now
								</button>
							</diiv>
						</div>
					</div>
				</div>
			@endforeach
				<?php 
					$given_array = $jobs;
					$offset = 5;
				 ?>
				@include('admin.pagination.paginator')
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
				console.log(data.success);
				if(data.message == 'success'){
					$('#job-id-'+job_id).html('Applied');
					$('#job-id-'+job_id).removeClass("btn-success").addClass("btn-secondary");
					 document.getElementById("job-id-"+job_id).disabled = true;  
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