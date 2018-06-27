@extends('spark::layouts.app')

@section('content')

  <div class="container-fluid">

    <div class="row">

    <div class="col-md-3">

    @if(isset($tag))
     
     <p>
      <span class="tag label label-primary">#{{ $tag }}</span> 
      <a href="/tags"><i class="fa fa-times text-danger"></i></a>
     </p>
     
    @endif

    <div id="tag_list"></div>

    </div><!--Col-->

    <div class="col-md-9">

      @if($maps->count())

      <h4>{{ __('common.maps') }}</h4>

      <div class="row">
        @include('maps.grid', ['records' => $maps])
      </div><!--Row-->

      @endif

      @if($posts->count())

      <h4>{{ __('common.posts') }}</h4>

      <div class="row">
        @include('posts.grid', ['records' => $posts])
      </div><!--Row-->

      @endif
      
    </div><!--Row-->


  </div><!--Col-->

</div><!--Container-->

@endsection


@push('plugins')
  @include('common.gettags')
@endpush