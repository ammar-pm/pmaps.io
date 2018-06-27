@foreach($records as $record)
  <div class="col-md-6">
    <div class="panel panel-default panel-body">
                   <p class="lead m-0"><a href="{{ $record->url }}">{{ str_limit($record->title, 30) }}</a></p>
                   <p class="m-0"><small><span class="label label-info small text-uppercase">{{ $record->type }}</span>
                   {{ $record->date }}</small>
                   <p class="label label-primary"><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>
    </div><!--Panel-->
  </div><!--Col-->
@endforeach