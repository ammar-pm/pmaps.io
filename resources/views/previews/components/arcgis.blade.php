var layer_{{ $dataset->id }} = L.esri.{{ $dataset->options['arcgis_type'] }}({
	url: "{{ $dataset->options['arcgis_url'] }}",
	style: function () {
	  return { color: "#70ca49", weight: 2 };
	}
}).addTo(map);