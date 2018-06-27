		  			<div class="form-group">
				  		<label>{{ __('common.maxzoom') }}</label><br>
				  		<input type="text" name="cluster_max_zoom" class="form-control" value="{{ $styles['max_zoom'] or 5}}" data-provide="slider" data-slider-max="20" data-slider-precision="5" data-slider-step="1" data-slider-value="{{ $styles['cluster_max_zoom'] or 5}}">
				  	</div>

				  	<div class="form-group">
				  		<label>{{ __('common.maxclusterradius') }}</label><br>
				  		<input type="text" name="cluster_maximum_radius" value="{{ $styles['cluster_maximum_radius'] or 50}}" class="form-control" data-provide="slider" data-slider-max="100" data-slider-precision="10" data-slider-step="10" data-slider-value="{{ $styles['cluster_maximum_radius'] or 50}}">
				  	</div>

				  	<div class="form-group">
				  		<label>{{ __('common.disableclusterzoom') }}</label><br>
				  		<input type="text" name="clustering_at_zoom" value="{{ $styles['clustering_at_zoom'] or 10}}" class="form-control" data-provide="slider" data-slider-max="20" data-slider-precision="1" data-slider-step="1" data-slider-value="{{ $styles['clustering_at_zoom'] or 10}}">
				  	</div>


		            <div class="checkbox">
		            	<input type="hidden" name="cluster_show_coverage_on_hover" value="false">
		            	<label><input type="checkbox" name="cluster_show_coverage_on_hover" value="true" {{ isset($styles['cluster_show_coverage_on_hover']) &&  $styles['cluster_show_coverage_on_hover'] == 'true' ? "checked" : ""}}> {{ __('common.showcoveragehover') }}</label>
		            </div>

		            <div class="checkbox">
		            	<input type="hidden" name="cluster_zoom_to_bounds_on_click" value="false">
		            	<label><input type="checkbox" name="cluster_zoom_to_bounds_on_click" value="true" {{ isset($styles['cluster_zoom_to_bounds_on_click']) &&  $styles['cluster_zoom_to_bounds_on_click'] == 'true' ? "checked" : ""}}> {{ __('common.zoomboundsclick') }}</label>
		            </div>

		            <div class="checkbox">
		            	<input type="hidden" name="cluster_spiderfy_on_max_zoom" value="false">
		            	<label><input type="checkbox" name="cluster_spiderfy_on_max_zoom" value="true" {{ isset($styles['cluster_spiderfy_on_max_zoom']) &&  $styles['cluster_spiderfy_on_max_zoom'] == 'true' ? "checked" : ""}}> {{ __('common.spiderfyzoom') }}</label>
		            </div>

		            <div class="checkbox">
		            	<input type="hidden" name="cluster_remove_outside_visible_bounds" value="false">
		            	<label><input type="checkbox" name="cluster_remove_outside_visible_bounds" value="true" {{ isset($styles['cluster_remove_outside_visible_bounds']) &&  $styles['cluster_remove_outside_visible_bounds'] == 'true' ? "checked" : ""}}> {{ __('common.rm-outside-visible-bounds') }}</label>
		            </div>

		            <div class="checkbox">
		            	<input type="hidden" name="cluster_animate" value="false">
		            	<label><input type="checkbox" name="cluster_animate" value="true" {{ isset($styles['cluster_animate']) &&  $styles['cluster_animate'] == 'true' ? "checked" : ""}}> {{ __('common.animate') }}</label>
		            </div>

		            <div class="checkbox">
		            	<input type="hidden" name="cluster_disable_clustering_at_zoom" value="false">
		            	<label><input type="checkbox" name="cluster_disable_clustering_at_zoom" value="true" {{ isset($styles['cluster_disable_clustering_at_zoom']) &&  $styles['cluster_disable_clustering_at_zoom'] == 'true' ? "checked" : ""}}> {{ __('common.disable-clutsering-at-zoom') }}</label>
		            </div>
