@extends('layouts.admin.app')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-header page-header">
				<h4><strong>Job Type management panel</strong></h4>
				<a href="{{route('admin.job-types.create')}}" class="btn btn-primary">Create new job type</a>
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
				      <th scope="col">id</th>
				      <th scope="col">Title</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($job_types as $type)
				    <tr>
				      <th scope="row">{{$type->id}}</th>
				      <td>{{$type->title}}</td>
				      <td>
				      	<a href="{{route('admin.job-types.edit', $type->id)}}" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-placement="bottom" title="Edit information">
							<i class="fas fa-edit"></i>
						</a>

						<button data-toggle="modal" data-tooltip="tooltip" data-target="#alertModal" data-id = "{{$type->id}}" data-placement="bottom" title="Delete from database" onclick="deleteData({{$type->id}})" class="btn btn-danger btn-sm">
							<i class="fas fa-trash-alt"></i>
						</button>
						<form action="{{route('admin.job-types.destroy', $type->id)}}" method="POST" style="display: none;" id="submit-delete-{{$type->id}}">
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
<div class="row mt-4">
	
</div>

@endsection