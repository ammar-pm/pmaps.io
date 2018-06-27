@extends('spark::layouts.app')
@section('content')

<div class="container">

@if(count($records))
<form action="/selected/trash/submit" method="POST">
  {{ csrf_field () }}

  <div class="row">

  <div class="col-md-12">

  <div class="panel panel-default panel-body">
      @include('trash.table')
  </div>

   </div><!--Col-->

  </div><!--Row-->

  
  <button class="btn btn-primary" name="restore"><i class="fa fa-refresh fa-btn"></i> {{ __('common.restoreselected') }}</button>
  <button class="btn btn-danger" name="delete"><i class="fa fa-refresh fa-btn"></i> {{ __('common.deleteselected') }}</button>
  

</form>
@else

<div class="alert alert-warning">Nothing in trash.</div>

@endif

</div>
<!-- End Container -->

@endsection