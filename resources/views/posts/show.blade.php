<div class="row">

  <div class="col-md-8">
    <p class="lead m-0">{{ $record->title }}</p> 
    <p><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>
    <p class="text-muted">{{ $record->date }}</p>
    
    @include('tags.list')

  </div>

  @if($record->share)
  <div class="col-md-4 text-right">
    @include('common.share')
  </div>
  @endif

</div><!--Row-->

<div class="m-t-md">
 {!! $record->description !!}
</div>

@if($record->iframe)
<iframe src="{{ $record->iframe }}" width="100%" height="520" frameborder="0" border="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
@endif

@if(count($record->maps))

<div class="row">

<div class="col-md-12">
<h4>{{ __('common.maps') }}</h4>
</div>

@include('maps.grid', ['records' => $record->maps])

</div>

@endif

@if($record->comments)
   @include('common.comments')
@endif