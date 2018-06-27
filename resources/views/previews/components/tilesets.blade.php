@foreach($tilesets as $tileset)

@if(!empty($tileset->key))
	var {{ $tileset->key }} = L.esri.basemapLayer('{{ $tileset->key }}');
@else 
	var tileset_{{ $tileset->id }} = L.tileLayer('{{ $tileset->url }}');
@endif 

@endforeach


var tilesets = {
	@foreach($tilesets as $tileset)
		@if(!empty($tileset->key))
	    	"{{ $tileset->title }}": {{ $tileset->key }},
	    @else 
	    	"{{ $tileset->title }}": tileset_{{ $tileset->id }},
	    @endif
    @endforeach
};