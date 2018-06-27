<h1>
@if(isset($record->icon))
	<img src="/storage/icons/{{ $record->icon }}" width="32">
@endif

{{ $record->title }}
</h1>


{!! $record->description !!}

<hr>

@if(count($record->maps))
<div class="row">

<div class="col-md-12">
<h4>{{ __('common.maps') }}</h4>
</div><!--Col-->

@include('maps.grid', ['records' => $record->maps])

</div><!--Row-->
@endif