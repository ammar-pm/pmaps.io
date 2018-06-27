@foreach($records as $record)
  <div class="col-md-4">
    <div class="panel panel-default panel-body">
             <p class="lead m-0"><a href="{{ Request::segment(1) }}/{{ $record->id }}/edit">{{ str_limit($record->title, 25) }}</a></p>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Column -->
@endforeach