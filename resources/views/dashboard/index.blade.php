@extends('spark::layouts.app')

@section('content')

  <div class="container-fluid">
    <div class="row">

      <div class="col-md-3">
                 
        @include('common.categories')

        @include('common.tagslist')

        @include('common.authors')

      </div>

      <div class="col-md-9">
          
          <div class="row">
            <h4 class="text-center">{{ __('common.posts') }}</h4>

            <div class="row">
              @include('posts.grid', ['records' => $posts])
            </div>
            
            <p class="text-center"><a href="/posts" class="btn btn-primary">{{ __('common.view_all') }}</a></p>


          </div>

          <div class="row">
            <h4 class="text-center">{{ __('common.maps') }}</h4>

            <div class="row">
            @include('maps.grid', ['records' => $maps])
            </div>

            <p class="text-center"><a href="/maps" class="btn btn-primary">{{ __('common.view_all') }}</a></p>

          </div>

      </div>

    </div>
  </div>

@endsection