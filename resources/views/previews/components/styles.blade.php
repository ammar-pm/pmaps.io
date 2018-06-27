var style_{{ $dataset->id }} = {}; 


style_{{ $dataset->id }}.stroke = 'true';
style_{{ $dataset->id }}.color = '{{ $dataset->options['stroke_color'] or null }}';
style_{{ $dataset->id }}.weight = '{{ $dataset->options['stroke_weight'] or null }}';	
style_{{ $dataset->id }}.opacity = '{{ $dataset->options['stroke_opacity'] or null }}';

style_{{ $dataset->id }}.fill = 'true';
style_{{ $dataset->id }}.fillColor = '{{ $dataset->options['fill_color'] or null }}';
style_{{ $dataset->id }}.fillOpacity = '{{ $dataset->options['fill_opacity'] or 0.5 }}';


var Marker_{{ $dataset->id }} = L.AwesomeMarkers.icon({
	'icon': '{{ $dataset->options['marker_icon'] or null }}',
	'markerColor': '{{ $dataset->options['marker_color'] or null }}',
	'iconColor': '{{ $dataset->options['icon_color'] or "#ffffff" }}',
	prefix: 'fa',
});


@if(in_array($dataset->file_type, config('pmaps.json')))

	var layer_{{ $dataset->id }} = L.geoJson({!! $dataset->file_data !!}, {
		style: style_{{ $dataset->id }},
		onEachFeature: onEachFeature_{{ $dataset->id }},
		pointToLayer: function (feature, latlng) {
			@include('previews.components.marker')
		}
	}).addTo(datasets);

	
@elseif(in_array($dataset->file_type, config('pmaps.csv')))

	var layer_{{ $dataset->id }} = L.geoCsv('{!! $dataset->file_data !!}', {
			style: style_{{ $dataset->id }},
			onEachFeature: onEachFeature_{{ $dataset->id }},
			pointToLayer: function (feature, latlng) {
				@include('previews.components.marker')
		    },

			firstLineTitles: true, 
			fieldSeparator: ',', 
			lineSeparator: ';',
	}).addTo(datasets);


@elseif(in_array($dataset->file_type, config('pmaps.zip')))

	var layer_{{ $dataset->id }} = L.geoJson({features:[]},{
		style: style_{{ $dataset->id }},
		onEachFeature: onEachFeature_{{ $dataset->id }},
		pointToLayer: function (feature, latlng) {
			@include('previews.components.marker')
		}

	}).addTo(datasets);

	shp('{{ str_contains($dataset->data,"filestackcontent") ? $dataset->data."+".rand().".zip" : $dataset->data }}').then(function(data){
		layer_{{ $dataset->id }}.addData(data);
	});			

@endif

@if($dataset->style == "cluster")
	
	markers_{{ $dataset->id }}.addLayer(layer_{{ $dataset->id }}).addTo(layer_{{ $dataset->id }});
	map.addLayer(markers_{{ $dataset->id }});

@elseif($dataset->style == "simple")

	map.addLayer(layer_{{ $dataset->id }});

@endif