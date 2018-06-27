		  <div class="form-group">
		  	<label>{{ __('common.minopacity') }}</label><br>
		  	<input type="text" class="form-control" name="minimum_opacity" value="{{ $styles['minimum_opacity'] or config('pmaps.heatmap.minimum_opacity')}}" data-provide="slider" data-slider-max="1" data-slider-step=".01" data-slider-precision="2" data-slider-value="{{ $styles['minimum_opacity'] or config('pmaps.heatmap.minimum_opacity')}}">
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.maxzoom') }}</label><br>
		  	<input type="text" class="form-control" name="heat_max_zoom" value="{{ $styles['heat_max_zoom'] or config('pmaps.heatmap.heat_max_zoom')}}" data-provide="slider" data-slider-max="24" data-slider-value="{{ $styles['heat_max_zoom'] or config('pmaps.heatmap.heat_max_zoom')}}">
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.maxpoint-intensity') }}</label><br>
		  	<input type="text" class="form-control" name="maximum_point_intensity" value="{{ $styles['maximum_point_intensity'] or config('pmaps.heatmap.maximum_point_intensity')}}" data-provide="slider" data-slider-max="1.0" data-slider-step=".01" data-slider-precision="2" data-slider-value="{{ $styles['maximum_point_intensity'] or config('pmaps.heatmap.maximum_point_intensity')}}">
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.radius') }}</label><br>
		  	<input type="text" class="form-control" name="radius" value="{{ $styles['radius'] or config('pmaps.heatmap.radius')}}" data-provide="slider" data-slider-max="100" data-slider-value="{{ $styles['radius'] or config('pmaps.heatmap.radius')}}">
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.blur') }}</label><br>
		  	<input type="text" class="form-control" name="blur" value="{{ $styles['blur'] or config('pmaps.heatmap.blur')}}" data-provide="slider" data-slider-max="100" data-slider-value="{{ $styles['blur'] or config('pmaps.heatmap.blur')}}">
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.gradient') }}</label>
		  </div>

		  <div class="form-group">
		  	<label>{{ __('common.outeramount') }}</label>
		  	<input type="text" name="gradient_outer_amount" value="{{ $styles['gradient_outer_amount'] or config('pmaps.heatmap.gradient_outer_amount') }}" class="form-control" placeholder="Amount">
		  	<label>{{ __('common.outercolor') }}</label>
		  	<input type="text" name="gradient_outer_color" value="{{ $styles['gradient_outer_color'] or config('pmaps.heatmap.gradient_outer_color') }}" class="form-control color-picker" placeholder="Color">

		  	<label>{{ __('common.centeramount') }}</label>
		  	<input type="text" name="gradient_center_amount" value="{{ $styles['gradient_center_amount'] or config('pmaps.heatmap.gradient_center_amount') }}" class="form-control" placeholder="Amount">
		  	<label>{{ __('common.centercolor') }}</label>
		  	<input type="text" name="gradient_center_color" value="{{ $styles['gradient_center_color'] or config('pmaps.heatmap.gradient_center_color') }}" class="form-control color-picker" placeholder="Color">

		  	<label>{{ __('common.inneramount') }}</label>
		  	<input type="text" name="gradient_inner_amount" value="{{ $styles['gradient_inner_amount'] or config('pmaps.heatmap.gradient_inner_amount') }}" class="form-control" placeholder="Amount">
		  	<label>{{ __('common.innercolor') }}</label>
		  	<input type="text" name="gradient_inner_color" value="{{ $styles['gradient_inner_color'] or config('pmaps.heatmap.gradient_inner_color') }}" class="form-control color-picker" placeholder="Color">
		  </div>