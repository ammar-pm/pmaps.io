<form action="/{{ Request::segment(1) }}/{{ Request::segment(2) }}" method="POST" enctype="multipart/form-data">
                
@if(isset($record->id))
    {{ method_field('PATCH') }}
@endif

{{ csrf_field() }}

{{ $slot }}

<button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>

</form>