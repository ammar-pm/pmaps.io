{{ csrf_field () }}

	<div class="form-group">
		<label>{{ __('common.title') }}</label>
		<input type="text" class="form-control" name="title" value="{{ $record->title or null }}" required>
	</div>

	<label>{{ __('common.type') }}</label>

	<div class="radio">
	<label><input type="radio" name="type" value="upload" {{ isset($record->type) &&  $record->type == 'upload' ? "checked" : ""}}> {{ __('common.upload') }} <small class="muted">CSV, XLS, JSON, SHP</small></label>
	</div>

	<div class="radio">
	<label><input type="radio" name="type" value="arcgis" {{ isset($record->type) && $record->type == 'arcgis' ? "checked" : ""}}> ArcGIS</label>
	</div>


	@if(Auth::user()->currentTeam->plan == 'admin')

	<div class="radio">
	<label><input type="radio" name="type" value="carto" {{ isset($record->type) && $record->type == 'carto' ? "checked" : ""}}> Carto</label>
	</div>

	@endif

	<!-- Start Upload -->
	<div id="upload" class="data-types">

	<input type="hidden" name="data_old" value="{{ $record->data or null }}">


	 <input type="filepicker" name="data_new" data-fp-button-text="{{ __('common.uploadfile')}}"  data-fp-button-class="btn btn-default btn-sm m-b-sm" onchange="$('#file_type').val(event.fpfile.mimetype)" data-fp-apikey="{{ env('FILESTACK_KEY') }}">
	 <input type="hidden" name="file_type" id="file_type" value="{{$record->file_type or null}}">

	 <p class="text-muted">{{ __('common.max_file_size') }} 250MB</p>


	</div>
	<!-- End Upload -->

<!-- Start ArcGIS -->
<div id="arcgis" class="data-types">

  <div class="form-group">
  	<label>{{ __('common.arcgistype') }}</label>
  	<select class="form-control" name="arcgis_type">
  		@foreach(config('pmaps.arcgis_types') as $key => $type)
  		<option value="{{ $key }}" {{isset($styles['arcgis_type']) && $styles['arcgis_type'] == $key ? "selected" : ""}}>{{ $type }}</option>
  		@endforeach
  	</select>
  </div>

 <div class="form-group">
 	<label>{{ __('common.arcgisurl') }}</label>
 	<input type="text" class="form-control" name="arcgis_url" value="{{ $styles['arcgis_url'] or null }}">
 </div>


</div>
<!-- End ArcGIS -->        


<!-- Start Carto -->
<div id="carto" class="data-types">

  	<div class="form-group">
  		<label>{{ __('common.cartojsurl') }}</label>
  		<input type="text" class="form-control" name="carto_url" value="{{ $styles['carto_url'] or null }}">
  	</div>

</div>
<!-- End Carto -->


<div class="form-group">
<label>{{ __('common.visibility') }}</label>
{{ Form::select('visibility', config('pmaps.visibilities'), isset($record->visibility) ? $record->visibility : " ", ['class' => 'form-control', 'style' => 'width:100%']) }}
</div>

    	       
@push('plugins')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/css/bootstrap-slider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/bootstrap-slider.min.js"></script>
<script>
jQuery( document ).ready(function() {

	// Type select
	typeSelect(jQuery("input[name='type']:checked").val());

	jQuery( document ).on("change", "input[name='type']", function(){
		type = jQuery(this).val();
		typeSelect(type);
	});

	function typeSelect(type){
		jQuery('.data-types').hide();
		jQuery('#'+type+'').show();
	}

	// Style select
	styleSelect(jQuery("input[name='style']:checked").val());

	jQuery( document ).on("change", "input[name='style']", function(){
		style = jQuery(this).val();
		styleSelect(style);
	});

	function styleSelect(style){
		jQuery('.data-styles').hide();
		jQuery('#'+style+'').show();
	}


});


$(function(){
	$("body").on("click",".dropdown-item",function(){
		var old_value = $('[name=popup_template]').val();
		$('[name=popup_template]').val(old_value + $(this).text());   
	});
});


$(function() {
    $('#cp8').colorpicker({
        colorSelectors: {
            'white': '#ffffff',
            'red': '#ff0000',
            'darkred': '#8b0000',
            'orange': '#eda032',
            'green': '#36d136',
            'darkgreen': '#006400',
            'blue': '#357bb8',
            'purple': '#800080',
            'cadetblue': '#5f9ea0'
        },
        customClass: "markercolor"
    });
});

</script>

@endpush