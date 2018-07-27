@foreach($records as $record)
<div class="col-md-6">
  <div class="panel panel-default panel-body">
      <p class="lead m-0"><a href="{{ $record->url }}">{{ str_limit($record->title, 20) }}</a></p>

      @if(isset($record->team))

      <p class="label label-primary"><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>

      @endif
      
      <p class="f-h-md"> 
      @include('tags.list', ['tags' => $record->tags])
  	  </p>
      <p class="small text-muted m-t-sm">{{ $record->date }}</p>
    </div>
</div>
@endforeach