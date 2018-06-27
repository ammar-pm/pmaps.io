@extends('spark::layouts.app')
@section('content')

<div class="container-fluid m-t">

<div class="row">

<div class="col-md-3">
	
		<div class="panel panel-default panel-body">

		@component('layouts.form', ['record' => $record])
		    @includeIf('' . Request::segment(1) . '.form')
		@endcomponent

		</div><!--Panel-->

	@includeIf('common.delete')

</div><!--Col-->

<div class="col-md-9">

	@includeIf('' . Request::segment(1) . '.show')

</div><!--Col-->

</div><!--Row-->

</div><!--Container-->

@endsection
