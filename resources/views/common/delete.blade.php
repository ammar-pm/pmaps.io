<form id="delete" method="post" action="/{{ Request::segment(1) }}/{{ $record->id }}">

	{{ method_field('DELETE') }}
	{{ csrf_field() }}
	
	<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

</form>