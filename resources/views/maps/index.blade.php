@extends('spark::layouts.app')

@section('content')

  <div class="container-fluid">

  <div class="row">

  <div class="col-md-3">

      @include('common.categories')

      @include('common.tagslist')

      @include('maps.create')

  </div>
  <!-- End Column -->

  <div class="col-md-9">

    <div class="row">

      <div class="col-md-12">
        @include('common.filters')
      </div><!--Col-->
      
    </div><!--Row-->

    <div class="row m-t-sm">
      @include('maps.grid')
    </div><!--Col-->

    @include('common.filters_pagination')

    </div><!--Row-->
  </div><!--Row-->
 
  </div><!--Container-->

@endsection