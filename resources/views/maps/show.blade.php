@extends('spark::layouts.app')
@section('content')

	<div class="container-fluid">

		<div class="row">
			<div id="sidebar" class="col-md-3">
				<div class="panel panel-default panel-body m-0">
						
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

		        <p class="m-0"><a href="/maps">{{ __('common.see_more_maps') }}</a></p>

  
				@if($record->share)
					@include('common.share')
				@endif

				@if($record->comments)
					@include('common.comments')
				@endif


			</div>

			<div class="col-md-9" >
				@include('previews.map')
			</div>
		</div>



	</div>

@endsection