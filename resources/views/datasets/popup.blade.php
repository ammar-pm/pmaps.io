<!-- Start Row -->
	<div class="row">

	<div class="col-md-6">
  	<div class="form-group">
        <label class="c-input c-checkbox">
        	<input name="enable_popup" type="hidden" value="0">
        	<input name="enable_popup" type="checkbox" value="1" {{ isset($record->enable_popup) && $record->enable_popup == 1 ? "checked" : ""}}>
        	<span class="c-indicator"></span>
        	{{ __('common.enablepopup') }}
        </label>
  	</div>		
 </div>

 <div class="col-md-6">	 

	<div class="dropdown btn-group pull-right">
      <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-code"></i>
        <span class="caret"></span>
      </button>
      <div class="dropdown-menu popup-shortcode" role="menu">
      	<i class="fa fa-refresh" aria-hidden="true"> {{ __('common.loading') }}</i>
      </div>
    </div> 		

</div>

</div>
<!-- End Row -->

<div class="form-group">
	<label>{{ __('common.template') }} <small>HTML</small></label>
	<textarea name="popup_template" class="form-control" id="popup_template" rows="10">{{ $record->popup_template or null }}</textarea>
</div>