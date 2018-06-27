@extends('spark::layouts.app')
@section('content')

<div class="container-fluid m-t">

<div class="row">

<div class="col-md-12">

	@includeIf('' . Request::segment(1) . '.show')

</div><!--Col-->

</div><!--Row-->

</div><!--Container-->

@endsection
