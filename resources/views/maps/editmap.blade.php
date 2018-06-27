<div class="panel panel-default panel-body">
  
  <form action="/maps/{{ $record->id }}" method="POST">
  
  {{ method_field('PATCH') }}
  
  <input type="hidden" name="id" value="{{ $record->id }}">
  <input type="hidden" name="legendorder" id="legendsort" value='["{!! $legends->pluck("id")->implode('","') !!}"]'>
  
  @include('maps.form')

</div>
<!-- Panel -->