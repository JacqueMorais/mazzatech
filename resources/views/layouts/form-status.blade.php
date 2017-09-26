@if (session('status'))

@if (!session('status_type') || session('status_type') == 'info')
<div class="alert alert-info fade in">
	<buttom class="close" data-dismiss="alert">&times;</buttom>

	<div class="clearfix">
		<div class="pull-left">
			<i class="fa fa-info"></i>
		</div>
		<div class="pull-left">
			@if (session('status_header'))
			<h4>{!! session('status_header') !!}</h4>
			@endif

			{!! session('status') !!}
		</div>
	</div>
</div>
@elseif (session('status_type') == 'success')
<div class="alert alert-success fade in">
	<buttom class="close" data-dismiss="alert">&times;</buttom>

	<div class="clearfix">
		<div class="pull-left">
			<i class="fa fa-check"></i>
		</div>
		<div class="pull-left">
			@if (session('status_header'))
			<h4>{!! session('status_header') !!}</h4>
			@endif

			{!! session('status') !!}
		</div>
	</div>
</div>
@elseif (session('status_type') == 'warning')
<div class="alert alert-warning fade in">
	<buttom class="close" data-dismiss="alert">&times;</buttom>

	<div class="clearfix">
		<div class="pull-left">
			<i class="fa fa-warning"></i>
		</div>
		<div class="pull-left">
			@if (session('status_header'))
			<h4>{!! session('status_header') !!}</h4>
			@endif

			{!! session('status') !!}
		</div>
	</div>
</div>
@endif

@endif
