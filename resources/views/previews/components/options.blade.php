@if($record->grid)
	L.grid({redraw: 'moveend'}).addTo(map);
@endif

@if($record->coordinates)
	L.control.coordinates().addTo(map);
@endif

@if($record->measure)
	var measureControl = L.control.measure({position: 'topleft', primaryLengthUnit: 'meters', secondaryLengthUnit: 'kilometers', primaryAreaUnit: 'sqmeters', secondaryAreaUnit: 'hectares'}); measureControl.addTo(map);
@endif

@if($record->print)
	L.easyPrint().addTo(map);
@endif