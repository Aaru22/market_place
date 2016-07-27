@extends('layout.admin_default')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading p-b-15">
	<div class="pull-left p-20 p-b-0">
		{!! Breadcrumbs::render('customerview') !!}
	</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		{{$error}}
	</div>
</div>
@endsection



