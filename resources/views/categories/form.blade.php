<div class="form-group">
    <label>{{ __('common.title') }}</label>
    <input type="text" class="form-control" name="title" value="{{ $record->title or null }}" required>
</div>

<div class="form-group">
    <label>{{ __('common.description') }}</label>
    <textarea class="form-control wysiwyg" name="description">{{ $record->description or null }}</textarea>
</div>

<div class="form-group">
	<label>{{ __('common.icon') }}</label>
	<input type="file" class="form-control" name="icon">
</div>

@if(isset($record->icon))

<p><img src="/storage/icons/{{ $record->icon }}" width="48"></p>

@endif