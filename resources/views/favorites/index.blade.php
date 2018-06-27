@extends('spark::layouts.app')

@section('content')

  <div class="container-fluid">

    <div class="row">

      <h4 class="text-center">{{ $title }}</h4>
      
      <div class="col-md-12">
        
        @if(!count($records))
        	<div class="alert alert-warning">{{ __('common.nofavmaps') }}</div>
        @endif

        @include('maps.grid')
      </div><!--Col-->

      </div><!--Row-->

  </div><!--Container-->

@endsection