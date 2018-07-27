@foreach($records as $record)      
  <div class="col-md-6">
    <div class="panel panel-default">
      <div id="map_{{ $record->id }}" style="width:100%; height:200px"></div>
        <div class="panel-body">
          <p class="lead m-0"><a href="{{ $record->url }}">{{ str_limit($record->title, 20) }}</a>
            
           @include('favorites.actions')
           
          </p>

          @if(isset($record->team))

          <p class="label label-primary"><a href="{{ $record->team->url }}">{{ __('common.by') }} {{ $record->team->name }}</a></p>
          <br><br>

          @endif

          @include('tags.list')

          <br>
          <p class="text-muted m-t">{{ $record->date }}</p>

        </div>
      </div>
  </div>
@endforeach 


@push('plugins')

  <script>
    @foreach($records as $record)
    
          var map_{{ $record->id }} = L.map('map_{{ $record->id }}', {
            center: [{{ config('pmaps.map.lat') }}, {{ config('pmaps.map.lng') }}],
            zoom: {{ config('pmaps.map.zoom') }},
            zoomControl: false,
            scrollWheelZoom: false
          });

         @if(count($record->tilesets))

          @switch($record->tilesets->first()->type)

          @case('tiles')
            L.tileLayer('{{ $record->tilesets->first()->url }}').addTo(map_{{ $record->id }});
          @break

          @case('esri')
            L.esri.basemapLayer('{{ $record->tilesets->first()->key }}').addTo(map_{{ $record->id }});
          @break

          @endswitch

         @else 

          L.tileLayer('{{ config('pmaps.map.tileset.url') }}').addTo(map_{{ $record->id }});

        @endif

    @endforeach

  </script> 

@endpush