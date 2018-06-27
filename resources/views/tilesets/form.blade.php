<div class="form-group">
    <label>{{ __('common.title') }}</label>
    <input type="text" class="form-control" name="title" value="{{ $record->title or null }}" required>
</div>


<label>{{ __('common.type') }}</label>

<div class="radio">
<label><input type="radio" name="type" value="tiles" {{ isset($record->type) &&  $record->type == 'tiles' ? "checked" : ""}}> {{ __('common.tileseturl') }}</label>
</div>

<div class="radio">
<label><input type="radio" name="type" value="esri" {{ isset($record->type) && $record->type == 'esri' ? "checked" : ""}}> {{ __('common.esrikey') }}</label>
</div>

<div id="tiles" class="tileset-types">

<div class="form-group">
    <label>{{ __('common.tileseturl') }}</label>
	<input type="text" class="form-control" name="url" value="{{ $record->url or null }}">
</div>		

</div>

<div id="esri" class="tileset-types">	

<div class="form-group">
	<label>{{ __('common.esrikey') }}</label>
	<input type="text" class="form-control" name="key" value="{{ $record->key or null }}">
</div>	  

</div>

<div class="form-group">
	<label>{{ __('common.sortorder') }}</label>
	<input type="text" class="form-control" name="sort" value="{{ $record->sort or null }}">
</div>


<button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>

</form>


@push('plugins')

<script>
	jQuery( document ).ready(function() {

		// Type select
		typeSelect(jQuery("input[name='type']:checked").val());

		jQuery( document ).on("change", "input[name='type']", function(){
			type = jQuery(this).val();
			typeSelect(type);
		});

		function typeSelect(type){
			jQuery('.tileset-types').hide();
			jQuery('#'+type+'').show();
		}

	});
</script>

@endpush