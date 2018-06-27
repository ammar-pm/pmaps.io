<div class="form-group">
    <label>{{ __('common.strokecolor') }}</label>
    <input type="text" class="form-control color-picker" name="stroke_color" value="{{ $styles['stroke_color'] or null }}">
</div>

<div class="form-group">
<label>{{ __('common.strokeweight') }}</label><br>
<input type="text" class="form-control" name="stroke_weight" value="{{ $styles['stroke_weight'] or null }}" data-provide="slider" data-slider-max="40" data-slider-step="1" data-slider-value="{{ $styles['stroke_weight'] or null }}" required>
</div>

<div class="form-group">
<label>{{ __('common.strokeopacity') }}</label><br>
<input type="text" class="form-control" name="stroke_opacity" value="{{ $styles['stroke_opacity'] or null }}" data-provide="slider" data-slider-max="1" data-slider-step=".05" data-slider-precision="2" data-slider-value="{{ $styles['stroke_opacity'] or null }}" required>
</div>
	
	
<div class="form-group">
    <label>{{ __('common.fillcolor') }}</label>
    <input type="text" class="form-control color-picker" name="fill_color" value="{{ $styles['fill_color'] or null }}">
</div>

<div class="form-group">
    <label>{{ __('common.fillopacity') }}</label><br>
<input type="text" class="form-control" name="fill_opacity" value="{{ $styles['fill_opacity'] or null }}" data-provide="slider" data-slider-max="1" data-slider-step=".05" data-slider-precision="2" data-slider-value="{{ $styles['fill_opacity'] or 0.5 }}" required>
</div>

<div class="form-group">
	<label>{{ __('common.markercolor') }}</label>
    <div id="cp8" data-format="alias" class="input-group colorpicker-component">
	    <input type="text" name="marker_color" value="{{ $styles['marker_color'] or null }}" class="form-control" />
	    <span class="input-group-addon"><i></i></span>
	</div>
</div>

<p><strong>{{ __('common.markerstyle') }}</strong></p>

<div class="radio">
	<label><input type="radio" name="marker_style" value="icon" {{ isset($styles['marker_style']) &&  $styles['marker_style'] == 'icon' ? "checked" : ""}}> {{ __('common.icon') }}</label>
</div>

<div class="radio">
	<label><input type="radio" name="marker_style" value="circle" {{ isset($styles['marker_style']) &&  $styles['marker_style'] == 'circle' ? "checked" : ""}}> {{ __('common.circle') }}</label>
</div>

<div id="icon" class="marker-styles">


<div class="form-group">
	<label>{{ __('common.markericon') }}</label><br>
	<button name="marker_icon" value="{{ $styles['marker_icon'] or null }}" data-iconset="fontawesome" data-icon="{{ $styles['marker_icon'] or null }}" role="iconpicker" class="btn btn-sm btn-default"></button>
</div>


<div class="form-group">
    <label>{{ __('common.iconcolor') }}</label>
    <input type="text" class="form-control color-picker" name="icon_color" value="{{ $styles['icon_color'] or null }}" placeholder="click to select">
</div>

</div>