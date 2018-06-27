@extends('spark::layouts.app')
@section('content')

<div class="container-fluid m-t">

<div class="row">

<div class="col-md-3">

<div class="panel panel-default panel-body">

<p>{{ __('common.create') }}</p>

@component('layouts.form')
    @includeIf('' . Request::segment(1) . '.form')
@endcomponent

</div>

</div><!--Col-->

<div class="col-md-9">

@if(count($records))
	@include('layouts.grid')
@endif

</div><!--Col-->


</div><!--Row-->

</div><!--Container-->

@endsection