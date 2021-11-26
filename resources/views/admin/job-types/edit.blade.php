@extends('layouts.admin.app')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header page-header">
        <h5>Update job type</h5>
        <a href="{{route('admin.job-types.index')}}" class="btn btn-light">Back to all</a>
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

        <form method="POST" action="{{route('admin.job-types.update', $job_type->id)}}">
          @csrf 
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$job_type->title ?? old('title')}}" placeholder="Enter title">
            @error('title')
              <div class="text-danger">
                <strong>{{$message}}</strong>
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection