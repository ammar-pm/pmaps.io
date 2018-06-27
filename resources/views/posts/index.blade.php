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

      <div class="row">

        <div class="col-md-12">
          @include('common.filters')
        </div><!--Col-->
        
      </div><!--Row-->

@if(count($records))
<div class="row m-t-sm">
	@include('posts.grid')
</div>

@include('common.filters_pagination')

@endif

</div><!--Col-->


</div><!--Row-->

</div><!--Container-->

@endsection