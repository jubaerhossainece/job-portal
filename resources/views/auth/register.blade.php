
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>


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

              <form class="pt-3" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" value="{{old('name')}}">
                  @error('name')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
                  @error('email')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="text" name="phone_number" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Phone Number" value="{{old('phone_number')}}">
                  @error('phone_number')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="text" name="university" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="University" value="{{old('university')}}">
                  @error('university')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="text" name="department" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Department" value="{{old('department')}}">
                  @error('department')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="text" name="current_company" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Current Company" value="{{old('current_company')}}">
                  @error('current_company')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="text" name="position" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Position/Designation" value="{{old('position')}}">
                  @error('position')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  @error('password')
                      <div class="text-danger">
                        <strong>{{$message}}</strong>
                      </div>
                    @enderror
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>

{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
