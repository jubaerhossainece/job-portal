@extends('layouts.admin.app')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header page-header">
        <h5>Create new job</h5>
        <a href="{{route('admin.jobs.index')}}" class="btn btn-light">Back to all</a>
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

        <form method="POST" action="{{route('admin.jobs.store')}}" enctype="multipart/form-data">
          @csrf 
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Enter title">
            @error('title')
              <div class="text-danger">
                <strong>{{$message}}</strong>
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{old('description')}}</textarea>
            @error('description')
              <div class="text-danger">
                <strong>{{$message}}</strong>
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label>Job Type</label>
            <br>
            <select name="job_types_id" id="job-type-select"  style="width: 100%;">
              @foreach($job_types as $type)
                <option @if(old('job_types_id') == $type->id) selected @endif value="{{$type->id}}">{{$type->title}}</option>
               @endforeach
            </select>
            @error('job_types_id')
              <div class="text-danger">
                <strong>{{$message}}</strong>
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
              <div class="custom-file">
                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                <label class="custom-file-label" for="thumbnail" id="thumbnail-label">{{'Choose file'}}</label>
              </div>
            </div>

              @error('thumbnail')
                <div class="text-danger">
                  <strong>{{$message}}</strong>
                </div>
              @enderror
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              
            <div class="form-check form-check-primary">
              <label class="form-check-label" for="customCheck1">
                <input type="checkbox" name="is_active" class="form-check-input" id="customCheck1" checked>                
                Active
                <i class="input-helper"></i>
              </label>

            </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('script')
<script>
  document.getElementById("thumbnail").onchange = function() {
    document.getElementById("thumbnail-label").innerHTML = this.value;
  };
</script>
@endpush
@endsection