<div id="map" class="map-lg"></div>


@push('plugins')
<script>

@include('previews.components.tilesets')

var map = L.map('map', {
	center: [{{ config('pmaps.map.lat')}}, {{ config('pmaps.map.lng') }}],
	zoom: {{ config('pmaps.map.zoom') }},
	scrollWheelZoom: false,
	fullscreenControl: true,
	layers: [{!! isset($tilesets[0]) && !empty($tilesets[0]->key) ? $tilesets[0]->key : "tileset_".$tilesets[0]->id !!}]
});

@include('previews.components.cartoclient')

@include('previews.components.options')

var datasets = L.layerGroup();

@foreach($datasets as $dataset)


	@if($dataset->type == 'arcgis')
		@include('previews.components.arcgis')

	@elseif($dataset->type == 'carto')
		@include('previews.components.carto')

	@elseif($dataset->type == 'upload')
		@include('previews.components.cluster')
		@include('previews.components.popup')
		@include('previews.components.styles')
	@endif

@endforeach

@include('previews.components.overlays')

@include('previews.components.watermark')

@if(count($record->legends))
	@include('previews.components.legend')
@endif

L.control.layers(tilesets, overlays).addTo(map);

</script>

@endpush