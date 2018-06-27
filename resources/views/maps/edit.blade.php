@extends('spark::layouts.app')
@section('content')

	<div class="container-fluid">

		<div class="row">
			<div id="sidebar" class="col-sm-12 col-lg-3">
				<div class="panel panel-default panel-body">
						
						<p class="lead m-0">{{ $record->title }}

						@include('favorites.actions')

						</p>
						
						<p><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>
						
						@if(isset($record->location))
							<p class="small text-muted m-0">{{ $record->location }}</p>
						@endif

						@if(isset($record->description))
							{!! $record->description !!}
						@endif

		        </div>

				@include('maps.editmap')


		     @include('common.delete', ['route' => "/maps/$record->id"])


			</div>

			<div class="col-sm-12 col-lg-9">
				@include('previews.map')
			</div>
		</div>



	</div>

@endsection