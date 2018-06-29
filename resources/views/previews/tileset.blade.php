<div id="map" class="map-lg"></div>

<script>

  var preview_map = L.map('map').setView([{{ config('pmaps.map.lat') }}, {{ config('pmaps.map.lng') }}], '{{ config('pmaps.map.zoom') }}');

  @if(isset($record->type))

  @switch($record->type)

  @case('tiles')
	  L.tileLayer('{{ $record->url }}').addTo(preview_map);
  @break

  @case('esri')
  	L.esri.basemapLayer('{{ $record->key }}').addTo(preview_map);
  @break

  @endswitch

  @endif