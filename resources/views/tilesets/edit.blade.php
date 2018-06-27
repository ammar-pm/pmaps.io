@extends('spark::layouts.app')

@section('content')

<div class="container-fluid">

<div class="row">

  <div class="col-md-3">

    <div class="panel panel-default panel-body">
		  @include('common.forms')
      @include('tilesets.form')
    </div>
    
    @include('common.delete', ['route' => "/tilesets/$record->id"])

  </div><!--Col-->

  <div class="col-md-9">

        <div class="panel panel-default">
            <div id="preview_map"></div>
        </div>

  </div><!--Col-->

  </div><!--Row-->

</div><!--Container-->


@endsection


@push('plugins')  

  @include('common.leaflet')

  <script>
  
    $("#form_{{ $record->id }}").on("change",function() {
      preview();
    });

    function preview() {
      $.ajax({
      type : 'PATCH',
      url : '/preview/tilesets',
      data : $('#form_{{ $record->id }}').serialize(),
      dataType: 'html',
        success: function(data) {
                      $('#preview_map').html(data);
              }
      });
    }
    preview();
  </script>

@endpush

