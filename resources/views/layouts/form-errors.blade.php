@if (count($errors))
<div class="alert alert-danger fade in">
	<buttom class="close" data-dismiss="alert">&times;</buttom>

	<div class="clearfix">
		<div class="pull-left">
			<i class="fa fa-times"></i>
		</div>

		<div class="pull-left">
			@if (session('error_header'))
			<h4>{!! session('error_header') ? session('error_header') : "Erro" !!}</h4>
			@endif

			@foreach ($errors->all() as $error)
			{!! $error !!} <br>
			@endforeach
		</div>
	</div>
</div>
@endif
