@extends('admin.main-admin')

@section('title', '| View Portfolio')

@section('content')

		<div class="row">
			<div class="col-md-8">
			<img src="{{ asset('images/' . $port->image) }}" height="200" width="300"/>
			<h1>{{ $port->title }}</h1>
			<p class="lead">{{ $port->body }}</p>
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Url:</label>
						<p><a href="{{ url($port->slug) }}">{{ url($port->slug) }}</a></p>
					</dl>

					<dl class="dl-horizontal">
						<label>Создан в:</label>
						<p>{{ date('M j, Y h:ia', strtotime($port->creted_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Обновлено на:</label>
						<p>{{ date('M j, Y h:ia', strtotime($port->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
						{!! Html::linkRoute('portfolio.edit', 'Изменить', array($port->id), array('class'=>'btn btn-primary btn-block')) !!}
						</div>

						<div class="col-sm-6">
							{!! Form::open(['route'=>['portfolio.destroy', $port->id], 'method'=>"DELETE"]) !!}

							{!! Form::submit('Удалить', ['class'=>'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}	
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
						{!! Html::linkRoute('portfolio.index', '<< Все Портфолио', [], ['class' => 'btn btn-default btn-block btn-margin-top']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection