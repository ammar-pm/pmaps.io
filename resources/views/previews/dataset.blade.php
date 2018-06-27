<div id="map" class="map-lg"></div>


@push('plugins')
<script>

var map = L.map('map', {
	center: [{{ config('pmaps.map.lat') }}, {{ config('pmaps.map.lng') }}],
	zoom: {{ config('pmaps.map.zoom') }},
	fullscreenControl: true,
});

@include('previews.components.cartoclient')

L.tileLayer('{{ Config::get('tileset') }}').addTo(map);

var datasets = L.layerGroup();

@if($dataset->type == 'upload')

@if($dataset->style == 'cluster')
	@include('previews.components.cluster')
@endif

@include('previews.components.popup')
@include('previews.components.styles')

@elseif($dataset->type == "arcgis")

	@include('previews.components.arcgis')

@elseif($dataset->type == 'carto')
	
	@include('previews.components.carto')

@endif

</script>
@endpush