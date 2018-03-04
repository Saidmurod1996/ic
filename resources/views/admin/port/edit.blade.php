@extends('admin.main-admin')

@section('title', '| Edit Portfolio')

@section('content')

		<div class="row">
			{!! Form::model($port, ['route' => ['portfolio.update', $port->id], 'method'=>'PUT', 'files' =>true]) !!}
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">



						<div class="col-md-8">
							{{ Form::label('title', 'Заглавие:') }}
							{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

							
							{{ Form::label('featured_image', 'Загрузить Изображение', ['class' => 'form-spacing-top'] ) }}
							<img id="blah" src="{{ asset('images/' . $port->image) }}" class="btn-margin-top img-rounded" style="width: 300px; height: 200px; " />
							{{ Form::file('featured_image', ['onchange'=>'readURL(this)', 'id'=>'imgInp',]) }}

							{{ Form::label('body', 'Главная Часть:', ['class' => 'form-spacing-top']) }}
							{{ Form::textarea('body', null, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>
			</div>			
		<div class="col-md-4">
			<div class="well">
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
					{!! Html::linkRoute('portfolio.show', 'Отмена', array($port->id), array('class'=>'btn btn-danger btn-block')) !!}
					</div>

					<div class="col-sm-6">
						{!! Form::submit('Сохранить', ['class'=>'btn btn-success btn-block']) !!}

					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>

@endsection

@section('script')
<script>
		function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
	</script>
@endsection