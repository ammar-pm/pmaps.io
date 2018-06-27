@extends('spark::layouts.app')

@section('content')

<div class="container-fluid">

<div class="row">

  <div class="col-md-3">

    <p class="small text-uppercase">{{ __('common.adddata') }}</p>

    <div class="panel panel-default panel-body">
        <form action="{{ route('datasets.store') }}" method="POST" id="form_{{ $record->id or null }}" enctype="multipart/form-data">
        @include('datasets.form')

        <input type="hidden" name="style" value="simple">
        <input type="hidden" name="marker_style" value="circle">

        <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>
    </div><!--Panel-->


  </div>
  <!-- End Column -->

    <div class="col-md-9">

      <div class="row">

        <div class="col-md-12">
          @include('common.filters')
        </div><!--Col-->
        
      </div><!--Row-->

      <div class="row m-t-sm">
        @include('datasets.grid')
      </div>
      <!-- End Row -->

      @include('common.filters_pagination')

    </div>
    <!-- End Column -->

  </div>
  <!-- End Row -->

</div>
<!-- End Container -->

@endsection