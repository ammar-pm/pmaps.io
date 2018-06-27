var legend = L.control({position: 'topright'});


	legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			labels = [];

		@foreach($record->legends as $legend)
			labels.push(
				'<li class="list-group-item"><i class="fa {{$legend["icon"]}}" style="color:{{$legend["color"]}}"></i> {{ $legend["title"] }}</li>' 
			);
		@endforeach

		div.innerHTML = labels.join('');
		return div;
	};

	legend.addTo(map);
