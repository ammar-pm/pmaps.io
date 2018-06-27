@extends('spark::layouts.app')

@section('content')

<div class="container">

<div class="row">

<div class="col-md-1">
	<img src="{{ $record->photo_url }}" class="img-circle" width="80">
</div><!--Col-->

<div class="col-md-7 p-t-md">
	<p class="lead m-0">{{ $record->name }}</p>
	<p class="text-muted">{{ __('common.joined') }} {{ $record->date }}</small></p>
</div><!--Col-->

<div class="col-md-4">

<a href="/authors" class="pull-right">{{ __('common.see_more_authors') }} <i class="fa fa-arrow-right"></i></a>

</div><!--Col-->

</div><!--Row-->

<div class="row m-t-md">

<div class="col-md-12">

<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#maps">{{ __('common.maps') }} <span class="label label-primary">{{ count($record->maps) }}</span></a></li>
  <li><a data-toggle="pill" href="#datasets">{{ __('common.datasets') }} <span class="label label-primary">{{ count($record->datasets) }}</span></a></li>
  <li><a data-toggle="pill" href="#posts">{{ __('common.posts') }} <span class="label label-primary">{{ count($record->posts) }}</span></a></li>
</ul>

<div class="tab-content m-t-lg">

	<div id="maps" class="tab-pane fade in active">

			@if(count($record->maps))

			<div class="row">

			<div class="col-md-12">
			<h4>{{ __('common.maps') }}</h4>
			</div>

			@include('maps.grid', ['records' => $record->maps])

			</div>

			@else

			<div class="alert alert-warning">No maps found for this author</div>

			@endif

	</div><!--Maps-->

	<div id="datasets" class="tab-pane fade">

			@if(count($record->datasets))

			<div class="row">

			<div class="col-md-12">
			<h4>{{ __('common.datasets') }}</h4>
			</div>

			@include('datasets.grid', ['records' => $record->datasets])

			</div>

			@else

			<div class="alert alert-warning">{{ __('common.no_datasets_for_author') }}</div>

			@endif

	</div><!--Datasets-->

	<div id="posts" class="tab-pane fade">

			@if(count($record->posts))

			<div class="row">

			<div class="col-md-12">
			<h4>{{ __('common.posts') }}</h4>
			</div>

			@include('posts.grid', ['records' => $record->posts])

			</div>

			@else

			<div class="alert alert-warning">{{ __('common.no_posts_for_author') }}</div>

			@endif

	</div><!--Posts-->

</div><!--TabContent-->

</div><!--Col-->

</div><!--Row-->

</div><!--Container-->

@endsection

@push('plugins')

<script>
$("body").on('shown','#maps', function() { 
  L.Util.requestAnimFrame(map.invalidateSize,map,!1,map._container);
});
</script>

@endpush