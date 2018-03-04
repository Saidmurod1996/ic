@extends('admin.main-admin')

@section('title', '| Home')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Добавить Портфолио</div>
					<div class="panel-body">

					{!! Form::open(['route' => 'portfolio.store', 'data-parsley-validate'=>'', 'files' => true]) !!}
		    			
						{{ Form::label('title', 'Заглавие:') }}
						{{ Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) }}

						{{ Form::label('featured_image', 'Загрузить Изображение', ['class' => 'btn-margin-top']) }}
						<img id="blah" src="{{ asset('images/' . 'default-news.png') }}" class="btn-margin-top img-rounded backup_picture" style="width: 300px; height: 200px; " />
						{{ Form::file('featured_image', ['onchange'=>'readURL(this)', 'id'=>'imgInp',]) }}
						
						
						

						{{ Form::label('body', 'Главная Часть:', ['class' => 'btn-margin-top']) }}
						{{ Form::textarea('body', null, array('class'=>'form-control', 'required'=>'')) }}
						
						{{ Form::submit('Добавить Портфолио', array('class'=>'btn btn-success btn-lg btn-block btn-margin-top')) }}

					{!! Form::close() !!}

					</div>

					</div>
				</div>
			</div>
		</div>

@endsection

@section('script')

	{!! Html::script('js/parsley.min.js') !!}

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

	<script>
$(document).ready(function()
{
    $(".backup_picture").on("error", function(){
        $(this).attr('src', './images/nopicture.png');
    });
});
</script>

@endsection