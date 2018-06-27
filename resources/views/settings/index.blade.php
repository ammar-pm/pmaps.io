@extends('spark::layouts.app')
@section('content')

<div class="container">

  <form action="/app/settings/update" method="POST">
    
  {{ csrf_field() }}

  <div class="row">
  
    <div class="col-md-3">

    <div class="panel panel-default panel-body">
      
        <ul class="nav nav-pills nav-stacked">

          <li class="nav-item active">
            <a class="nav-link" href="#general" data-toggle="tab"><i class="fa fa-gear fa-lg"></i> {{ __('common.general') }}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#social" data-toggle="tab"><i class="fa fa-facebook-square fa-lg"></i> {{ __('common.social') }}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#advanced" data-toggle="tab"><i class="fa fa-code fa-lg"></i> {{ __('common.advanced') }}</a>
          </li>

          
        </ul>

        </div><!--Panel-->

        <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>

    </div><!--Col-->


    <div class="col-md-9">
      <div class="panel panel-body panel-default">

        <div class="tab-content p-a-1 m-b-1">

          <div class="tab-pane active" id="general">
	            @include('settings.tabs.general')
          </div>

          <div class="tab-pane" id="social">
              @include('settings.tabs.social')
          </div>
          
          <div class="tab-pane" id="advanced">
              @include('settings.tabs.advanced')
          </div>


        </div><!--Tab Content-->


        </div><!--Panel-->
      </div><!--Col-->

  </div><!--Row-->
      
    
  
  
  </form>

</div><!--Container-->

@endsection