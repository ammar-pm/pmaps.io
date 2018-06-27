@extends('landing.layout')
@section('content')

    <div class="container content mt-md">
      <div class="row">
        <div class="col-md-6">
          <form action="/contact" method="POST" class="contact">
    
            {{ csrf_field() }}
    
            <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" required>
            </div>

            <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" required>
            </div>

            <div class="form-group">
            <label>Phone *</label>
            <input type="tel" name="phone" required>
            </div>

            <div class="form-group">
            <label>Comments *</label>
            <textarea name="comments" required></textarea>
            </div>

            <button type="submit">Send message <i class="ion-arrow-right-c"></i></button>

          </form>
        </div><!--Col-->

        <div class="col-md-6">
          <p>

            @if(Config::get('phone'))
            <span><i class="ion-android-call"></i> {{ Config::get('phone') }}</span>
            @endif

            @if(Config::get('email'))
            <span><i class="ion-ios-email-outline"></i> <a href="mailto:{{ Config::get('email') }}">{{ Config::get('email') }}</a></span>
            @endif

          </p>
          <div id="map"></div>
        </div>
      </div><!--Row-->
    </div><!--Container-->




@endsection


@push('plugins')
@include('common.leaflet')
<script>

  var map = L.map('map').setView([{{ config('pmaps.map.lat') }}, {{ config('pmaps.map.lng') }}], {{ config('pmaps.map.zoom') }});

  var myIcon = L.icon({
    iconUrl: '/images/pmaps-favicon-icon.png',
    iconSize: [25, 35],
    iconAnchor: [10, 15],
  });

  L.tileLayer('{{ config('pmaps.map.tileset.url') }}', {
  }).addTo(map);

   
  L.marker([31.768319, 35.213710], {icon: myIcon}).addTo(map);

</script>

@endpush
