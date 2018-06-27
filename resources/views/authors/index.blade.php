@extends('spark::layouts.app')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-md-12">

      <h1 class="text-center">{{ __('common.authors') }}</h1>

      @foreach($records as $record)

      <div class="col-md-4">

        <div class="panel panel-body" style="height:140px">

          <p class="lead m-0">
            <img src="{{ $record->photo_url }}" class="img-circle" width="40">
            <a href="/authors/{{ $record->id }}">{{ $record->name }}</a>
          </p>

          <p class="m-t-md">
            <span class="label label-primary">{{ count($record->maps) }} {{ __('common.maps') }}</span>
            <span class="label label-primary">{{ count($record->datasets) }} {{ __('common.datasets') }}</span>
            <span class="label label-primary">{{ count($record->posts) }} {{ __('common.posts') }}</span>
          </p>

        </div>

      </div>

      @endforeach

      </div><!--Col-->



      </div><!--Row-->

      <div class="row">
        <div class="col-md-4">
          {{ $records->links() }}
        </div><!--Col-->
      </div><!--Row-->

      </div><!--Container-->


@endsection