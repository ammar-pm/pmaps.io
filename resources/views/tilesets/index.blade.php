@extends('spark::layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">

      <div class="col-md-3">
        <p class="small text-uppercase">{{ __('common.addtileset') }}</p>
        <div class="panel panel-default panel-body">
            @include('common.forms')     
            @include('tilesets.form')
        </div>
      </div><!--Col-->

      <div class="col-md-9">
          <div class="row">
            @foreach($records as $record)
              <div class="col-md-4">
                <div class="panel panel-default panel-body">
                  <p class="lead"><a href="/tilesets/{{ $record->id }}/edit">{{ str_limit($record->title, 20) }}</a></p>
                  <div id="map_{{ $record->id }}" class="map-sm"></div>
                </div>
              </div>                            
            @endforeach
          </div>
        </div>

    </div>
</div>
    
@endsection

@push('plugins')  

  @include('common.leaflet')

  <script>
    @foreach($records as $record)

      var preview_map = L.map('map_{{ $record->id }}', {
        center: [{{config('pmaps.map.lat')}}, {{config('pmaps.map.lng')}}],
        zoom: {{ config('pmaps.map.zoom') }},
        zoomControl: false,
        scrollWheelZoom: false
      });

      @if($record->type == 'tiles')
        L.tileLayer('{{ $record->url }}').addTo(preview_map);

      @elseif($record->type == 'esri')
        L.esri.basemapLayer('{{ $record->key }}').addTo(preview_map);
      @endif
      
    @endforeach
  </script>

@endpush