@extends('spark::layouts.app')
@section('content')

<div class="row">

      	<div id="sidebar" class="col-md-3">

        	<div class="panel panel-default panel-body">

			        <form id="dataset" action="/datasets/{{ $record->id }}" method="POST">
	    	       
	    	        {{ method_field('PATCH') }}

	    	        <input type="hidden" name="id" value="{{ $record->id }}">

					@include('datasets.tabs')

			       	<div class="tab-content p-a-sm m-t-sm">

			          <div class="tab-pane active" id="general">
			          @include('datasets.form')
			          </div>

			          <div class="tab-pane" id="styles">
						  	@include('datasets.styles')
					  </div>

			          <div class="tab-pane" id="popup">
			          @include('datasets.popup')
			          </div>


			       </div>
			       <!-- End Tabs -->

			       <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>

				</form>

	    	 </div><!--Panel-->

			@if(!empty($record->data))
			<p><a href="{{ $record->data }}" target="_blank" class="btn btn-success btn-block">{{ __('common.dwnldcurrentfile')}}</a></p>
			@endif



	   </div><!--Sidebar-->

		<div class="col-md-9">
		    
		    <div class="panel panel-default">
				    @include('previews.dataset')
		    </div>
		    
	    </div>



</div>
<!-- End Row -->

@include('common.delete', ['route' => "/datasets/$record->id"])

@endsection