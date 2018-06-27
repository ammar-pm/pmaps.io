{{ csrf_field() }}
			
		<ul class="nav nav-tabs m-b-sm text-center">
          
          <li class="nav-item active">
            <a class="nav-link" href="#general" data-toggle="tab"><i class="fa fa-clipboard fa-lg"></i> <br> {{ __('common.general') }}</a>
          </li>

          <li class="nav-item">
          	<a class="nav-link" href="#legend" data-toggle="tab"><i class="fa fa-compass fa-lg"></i> <br> {{ __('common.legend') }}</a>
          </li>

		  <li class="nav-item">
          	<a class="nav-link" href="#options" data-toggle="tab"><i class="fa fa-sliders fa-lg"></i> <br> {{ __('common.options') }}</a>
          </li>


		</ul>	

       <div class="tab-content">
          <div class="tab-pane active" id="general">

			  <div class="form-group">
                <label>{{ __('common.title') }} *</label>
                <input type="text" class="form-control" name="title" value="{{ $record->title or null }}" required>
              </div>

              <div class="form-group">
              	<label>{{ __('common.location') }}</label>
              	<input type="search" class="form-control" id="location-input" name="location" value="{{ $record->location or null }}">
              </div>

				  <div class="form-group">
	              	<label>{{ __('common.description') }} *</label>
	              	<textarea class="form-control wysiwyg" name="description" required>{{ $record->description or null }}</textarea>
	              </div>

              
				<div class="form-group">
					<label>{{ __('common.datasets') }}</label><br>
					{{ Form::select('datasets[]', $datasets_list, isset($record->datasets) ? $record->datasets->pluck('id')->toArray() : " ", ['class' => 'selectpicker', 'multiple' => 'true', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'data-selected-text-format' => 'count > 2', 'data-dropup-auto' => 'false', 'data-width' => '100%']) }}
				</div>

				<div class="form-group">
					<label>{{ __('common.tilesets') }}</label><br>
					{{ Form::select('tilesets[]', $tilesets_list, isset($record->tilesets) ? $record->tilesets->pluck('id')->toArray() : " ", ['class' => 'selectpicker', 'multiple' => 'true', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'data-selected-text-format' => 'count > 2', 'data-dropup-auto' => 'false', 'data-width' => '100%']) }}
				</div>

				<div class="form-group">
					<label>{{ __('common.categories') }}</label><br>
					{{ Form::select('categories[]', $categories_list, isset($record->categories) ? $record->categories->pluck('id')->toArray() : " ", ['class' => 'selectpicker', 'multiple' => 'true', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'data-selected-text-format' => 'count > 2', 'data-dropup-auto' => 'false', 'data-width' => '100%']) }}
				</div>
     
				<div class="form-group">
					<label>{{ __('common.tags') }}</label><br>
					<input type="text" name="tags" value="{{ $record->tags or null }}" data-role="tagsinput">
				</div>

				<div class="form-group">
				<label>{{ __('common.visibility') }}</label>
				{{ Form::select('visibility', config('pmaps.visibilities'), isset($record->visibility) ? $record->visibility : " ", ['class' => 'form-control', 'style' => 'width:100%']) }}
				</div>

				<div class="checkbox">
				<input type="hidden" name="share" value="0">
				<label><input type="checkbox" name="share" value="1" {{ isset($record->share) && $record->share == 1 ? "checked" : ""}}> {{ __('common.allowsharing?') }} </label>
				</div>

				<div class="checkbox">
				<input type="hidden" name="comments" value="0">
				<label><input type="checkbox" name="comments" value="1" {{ isset($record->comments) && $record->comments == 1 ? "checked" : ""}}> {{ __('common.allowcomments?') }} </label>
				</div>


      </div>
      <!-- End Tab -->


	<div class="tab-pane" id="legend">

	
	<div id="legenddiv">
		@if(isset($record) && $record->legends->count() > 0)
			@foreach($record->legends as $legend)

			<div id="{{ $legend->id }}" class="row">

				<div class="form-group col-md-3">
					<label>{{ __('common.title') }}</label>
					<input type="text" name="map_legend[{{ $legend->id }}][title]" value="{{ $legend->title }}" class="form-control" required>
				</div>

				<div class="form-group col-md-3">
					<label>{{ __('common.color') }}</label>
					<input type="text" name="map_legend[{{ $legend->id }}][color]" value="{{ $legend->color }}" class="form-control color-picker">
				</div>

				<div class="form-group col-md-3">
					<label>{{ __('common.icon') }}</label>
					<button name="map_legend[{{ $legend->id }}][icon]" value="{{ $legend->icon }}" data-iconset="fontawesome" data-icon="{{ $legend->icon }}" role="iconpicker" class="btn btn-sm btn-default"></button>
				</div>

				<div class="form-group col-md-3">
				<label>{{ __('common.action') }}</label>
				<a href="#"><i class="fa fa-arrows fa-fw"></i></a> 
				<a href="#" data-id="{{ $legend->id }}" class="deleteit"><i class="fa fa-trash fa-fw"></i></a>
				</div>

			</div>

			@endforeach
		@endif
	</div>

	<a href="#" class="btn btn-default btn-sm m-b-sm addlegend" id="add_legend"><i class="fa fa-plus"></i></a>




	</div>
	<!-- End Tab -->
            
              
     <div class="tab-pane" id="options">


				<div class="checkbox">
				<input type="hidden" name="grid" value="0">
				<label><input type="checkbox" name="grid" value="1" {{ isset($record->grid) && $record->grid == 1 ? "checked" : ""}}> {{ __('common.grid') }} </label>
				</div>
			  
				<div class="checkbox">
				<input type="hidden" name="coordinates" value="0">
				<label><input type="checkbox" name="coordinates" value="1" {{ isset($record->coordinates) && $record->coordinates == 1 ? "checked" : ""}}> {{ __('common.coordinates') }} </label>
				</div>
			  
				<div class="checkbox">
				<input type="hidden" name="measure" value="0">
				<label><input type="checkbox" name="measure" value="1" {{ isset($record->measure) && $record->measure == 1 ? "checked" : ""}}> {{ __('common.measure') }} </label>
				</div>
			  
				<div class="checkbox">
				<input type="hidden" name="print" value="0">
				<label><input type="checkbox" name="print" value="1" {{ isset($record->print) && $record->print == 1 ? "checked" : ""}}> {{ __('common.print') }} </label>
				</div>

	</div>
	<!-- End Tab -->




	</div>
	<!-- End Tabs -->


			  
			  <button type="submit" class="btn btn-primary">{{ __('common.save') }}</button>

			  </form>
			  
			  
@push('plugins')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/css/bootstrap-slider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/bootstrap-slider.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.4.15"></script>


<script>
  
 	$('body').on('click', '#add_legend', function() {
		var key = new Date().valueOf();
		var html = '';

		html +='<div id="'+key+'" class="row">';
		html +='<div class="form-group col-md-3">';
		html +='<input type="text" name="map_legend['+key+'][title]" value="" class="form-control">';
		html +='</div>';

		html +='<div class="form-group col-md-3">';
		html +='<input type="text" name="map_legend['+key+'][color]" value="" class="form-control color-picker">';
		html +='</div>';

		html +='<div class="form-group col-md-3">';
		html +='<button name="map_legend['+key+'][icon]" value="" data-iconset="fontawesome" data-icon="fa-map-marker" role="iconpicker" class="btn btn-sm btn-default iconpicker"></button>';
		html +='</div>';

		html +='<div class="form-group col-md-3">';
		html +='<a href="#"><i class="fa fa-arrows"></i></a>&nbsp;'; 
		html +='<a href="#" data-id="'+key+'" class="deleteit"><i class="fa fa-trash"></i></a>';
		html +='</div>';

		html +='</div>';

		$("#legenddiv").append(html);
		$('.iconpicker').iconpicker();
		$('.color-picker').colorpicker();

	});

    $(function () {
      $('#legenddiv').sortable();
        $('#legenddiv').on('sortupdate',function() {
        var newOrder = JSON.stringify($(this).sortable('toArray'));
          $('#legendsort').val(newOrder);
        });
    });
	
	$('.color-picker').colorpicker();

	$('body').on('click', '.deleteit', function() {
	    $('#'+$(this).data("id")).remove();
	});
  
    $("#previewmap").on("change focusout",function() {
    });



    $(function () {
      $('#sortable').sortable();
        $('#sortable').on('sortupdate',function() {
          var newOrder = JSON.stringify($(this).sortable('toArray'));
          $('#sort').val(newOrder);
        });
    });

    $(function () {
      $('#legenddiv').sortable();
        $('#legenddiv').on('sortupdate',function() {
        var newOrder = JSON.stringify($(this).sortable('toArray'));
          $('#legendsort').val(newOrder);
        });
    });


    var placesAutocomplete = places({
	    container: document.querySelector('#location-input')
	});


  </script>

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endpush