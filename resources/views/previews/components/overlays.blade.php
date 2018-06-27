var overlays = {
@foreach($datasets as $dataset)
	"{{ $dataset->title }}": layer_{{ $dataset->id }},
@endforeach
};