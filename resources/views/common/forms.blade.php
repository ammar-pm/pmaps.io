<form action="/{{ Request::segment(1) }}/{{ Request::segment(2) }}" method="POST" id="form_{{ $record->id or null }}" enctype="multipart/form-data">
                
@if(isset($record->id))
    {{ method_field('PATCH') }}
@endif

{{ csrf_field() }}