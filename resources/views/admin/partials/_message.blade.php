@if(Session::has('success'))

	<div ng-app = "myApp" ng-controller="myCtrl" >
		<div class="alert alert-success" role="alert" ng-show="show">
			<strong>Success:</strong> {{ Session::get('success') }}
		</div>
	</div>

@endif

@if(Session::has('wrong'))

	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ Session::get('wrong') }}
	</div>

@endif

@if(count($errors)>0 )
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif