	<div class="form-group">
	    <label>{{ __('common.title') }}</label>
	    <input type="text" class="form-control" name="title" value="{{ $record->title or null }}" required>
	</div>

	<div class="form-group">
	    <label>{{ __('common.description') }}</label>
	    <textarea class="form-control wysiwyg" name="description">{{ $record->description or null }}</textarea>
	</div>

	<div class="form-group">
	<label>{{ __('common.maps') }}</label><br>
	{{ Form::select('maps[]', $maps->sort(), isset($record->maps) ? $record->maps->pluck('id')->toArray() : " ", ['class' => 'selectpicker', 'multiple' => 'true', 'data-live-search' => 'true', 'data-actions-box' => 'true', 'data-selected-text-format' => 'count > 2', 'data-dropup-auto' => 'false', 'data-width' => '100%']) }}
	</div>

	<div class="form-group">
		<label>iFrame</label>
		<input type="text" class="form-control" name="iframe" value="{{ $record->iframe or null }}">
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
	<label><input type="checkbox" name="share" value="1" {{ isset($record->share) && $record->share == 1 ? "checked" : ""}}> {{ __('common.share') }} </label>
	</div>

	<div class="checkbox">
	<input type="hidden" name="comments" value="0">
	<label><input type="checkbox" name="comments" value="1" {{ isset($record->comments) && $record->comments == 1 ? "checked" : ""}}> {{ __('common.comments') }} </label>
	</div>