          <p><strong>{{ __('common.choosestyle') }}</strong></p>

          <div class="row">

          <div class="img-option col-md-3 col-sm-4">
		  	<label>
		    <input type="radio" name="style" value="simple" {{ isset($record->style) &&  $record->style == 'simple' || $record->style == "" ? "checked" : ""}}>
		    <img src="/images/simple.png" class="img-thumbnail">
		    <small>{{ __('common.simple') }}</small>
		  	</label>
		  </div>

          <div class="img-option col-md-3 col-sm-4">
		  	<label>
		    <input type="radio" name="style" value="cluster" {{ isset($record->style) && $record->style == 'cluster' ? "checked" : ""}}>
		    <img src="/images/simple.png" class="img-thumbnail">
		    <small>{{ __('common.cluster') }}</small>
		  	</label>
		  </div>

          <div class="img-option col-md-3 col-sm-4">
		  	<label>
		    <input type="radio" name="style" value="heatmap" {{ isset($record->style) && $record->style == 'heatmap' ? "checked" : ""}}>
		    <img src="/images/heatmap.png" class="img-thumbnail">
		    <small>{{ __('common.heatmap') }}</small>
		    </label>
		  </div>


		  </div>


		  <div id="simple" class="data-styles">
		  @include('datasets.styles.simple')
		  </div>
		  <!-- End Style -->

		  <div id="cluster" class="data-styles">
		  @include('datasets.styles.cluster')
		  </div>
		  <!-- End Style -->

		  <div id="heatmap" class="data-styles">
		  @include('datasets.styles.heatmap')
		  </div>
		  <!-- End Style -->