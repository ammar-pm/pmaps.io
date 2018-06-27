<p><strong>{{ __('common.choosestyle') }}</strong></p>

<div class="row">

<div class="img-option col-md-3 col-sm-4">
	<label>
<input type="radio" name="style" value="simple" {{ isset($styles['style']) &&  $styles['style'] == 'simple' || $record->style == "" ? "checked" : ""}}>
<img src="/images/simple.png" class="img-thumbnail">
<small>{{ __('common.simple') }}</small>
	</label>
</div>

@if(in_array($record->file_type, config('pmaps.csv')) || in_array($record->file_type, config('pmaps.json')))

<div class="img-option col-md-3 col-sm-4">
	<label>
<input type="radio" name="style" value="cluster" {{ isset($styles['style']) && $styles['style'] == 'cluster' ? "checked" : ""}}>
<img src="/images/simple.png" class="img-thumbnail">
<small>{{ __('common.cluster') }}</small>
	</label>
</div>

@endif


</div>

<div id="simple" class="data-styles">
@include('datasets.styles.simple')
</div>

<div id="cluster" class="data-styles">
@include('datasets.styles.cluster')
</div>