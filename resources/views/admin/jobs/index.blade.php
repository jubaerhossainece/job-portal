@extends('layouts.admin.app')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-header page-header">
				<h4><strong>Job management panel</strong></h4>
				<a href="{{route('admin.jobs.create')}}" class="btn btn-primary">Create new job</a>
			</div>
			<div class="card-body">

				@if(Session::has('success'))
		          <div class="alert alert-success alert-dismissible fade show" role="alert">
		            <strong>Success!</strong> {{Session::get('success')}}
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		        @elseif(Session::has('warning'))
		          <div class="alert alert-warning alert-dismissible fade show" role="alert">
		            <strong>Warning!</strong> {{Session::get('warning')}}
		            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		        @endif
		        
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Title</th>
				      <th scope="col">Job Type</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($jobs as $job)
				    <tr>
				      <td>{{$job->title}}</td>
				      <td>{{$job->jobType->title}}</td>
				      <td>
				      	@if($job->is_active)

				      		<button onclick="changeStatus({{$job->id}})" id="job-status-{{$job->id}}" class="btn-sm btn badge badge-success text-white">
								Active
							</button>
						@else
							<button onclick="changeStatus({{$job->id}})" id="job-status-{{$job->id}}" class="btn-sm btn badge badge-warning text-white">
								Deactive
							</button>
                        @endif
				      </td>
				      <td>
				      	<a href="{{route('admin.jobs.edit', $job->id)}}" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-placement="bottom" title="Edit information">
							<i class="fas fa-edit"></i>
						</a>
	
	    				<a href="{{route('admin.jobs.show', $job->id)}}" class="btn btn-secondary btn-sm" data-tooltip="tooltip" data-placement="bottom" title="show detail information" >
	    					<i class="fas fa-eye"></i>
	    				</a>

						<button data-toggle="modal" data-tooltip="tooltip" data-target="#alertModal" data-id = "{{$job->id}}" data-placement="bottom" title="Delete from database" onclick="deleteData({{$job->id}})" class="btn btn-danger btn-sm">
							<i class="fas fa-trash-alt"></i>
						</button>
						<form action="{{route('admin.jobs.destroy', $job->id)}}" method="POST" style="display: none;" id="submit-delete-{{$job->id}}">
							@csrf
							@method('DELETE')
						</form>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
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