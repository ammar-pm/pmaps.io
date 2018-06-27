@if(count($record->favorites))
<a href="/favorite/{{ $record->id }}"><i class="fa fa-heart text-danger"></i></a>
@else
<a href="/favorite/{{ $record->id }}"><i class="fa fa-heart-o"></i></a>
@endif