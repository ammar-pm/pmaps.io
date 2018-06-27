@if(isset($dataset->options['marker_style']))

@if($dataset->options['marker_style'] == "circle")
	return new L.CircleMarker(latlng, {radius: 10});
@else
	return L.marker(latlng, {icon: Marker_{{ $dataset->id }}});
@endif

@endif