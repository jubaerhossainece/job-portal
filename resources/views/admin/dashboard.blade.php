@extends('layouts.admin.app')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			
			<div class="card-body">
					<h5>Welcome to dashboard, {{Auth::guard('admin')->user()->name}}</h5>	
				
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
		<div class="col-md-4">
			<div class="card card-tale">
				<div class="card-body text-center">
					<h4>Total Jobs</h4>
					<p>120</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card card-dark-blue">
				<div class="card-body text-center">
					<h4>Total Jobs</h4>
					<p>120</p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card card-light-blue">
				<div class="card-body text-center">
					<h4>Total Jobs</h4>
					<p>120</p>
				</div>
			</div>
		</div>
</div>

@endsection