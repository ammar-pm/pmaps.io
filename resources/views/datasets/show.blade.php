@extends('spark::layouts.app')
@section('content')

<div class="row">

		<div class="col-md-6">

		    <p class="lead m-0">{{ $record->title }} </p>
		    <p class="text-muted"><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>

		</div><!--Col-->

		<div class="col-md-6 text-right">
			<p><a href="/datasets">{{ __('common.see_more_datasets') }}</a></p>
		</div>

</div><!--Row-->

<div class="row">
	<div class="col-md-12">
		    <div class="panel panel-default">
				    @include('previews.dataset')
		    </div>
	  </div><!--Col-->
</div>
<!-- End Row -->


@endsection