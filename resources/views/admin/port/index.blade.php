@extends('admin.main-admin')

@section('title', '| Home')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>Все Портфолио</h1>
		</div>

		<div class="col-md-2">
			<a href="{{ route('portfolio.create') }}" class="btn btn-success btn-lg btn-block btn-margin-top">Добавить</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
					@foreach($ports as $port)

						<div class="media-stuff"   onclick="location.href='{{ route('portfolio.show', $port->id) }}'">
							
							<div class="row">
								
								<div class="col-md-3">
									<img src="{{ asset('images/' . $port->image) }}" height="200" width="200"/>
								</div>

								<div class="col-md-9">
									<h2>{{ $port->title }}</h2>
									<h4>{{ substr($port->body, 0, 300) }}{{ strlen($port->body) > 300 ? "..." : "" }}</h4>
								</div>

							</div>

						</div>

						{{-- <tr onclick="location.href='{{ route('port.show', $port->id) }}'">
							<th>{{ $port->id }}</th>
							<td>{{ $port->title }}</td>
							<td>{{ substr($port->body, 0, 150) }}{{ strlen($port->body) > 150 ? "..." : "" }}</td>
							<td>{{ date("M j, Y", strtotime($port->created_at)) }}</td>
							
						</tr>
 --}}
					@endforeach

			<div class="text-center">
				{{ $ports->links() }}
			</div>
		</div>
	</div>

@endsection