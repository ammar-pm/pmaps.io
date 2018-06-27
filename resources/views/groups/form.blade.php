<div class="form-group">
    <label>{{ __('common.name') }}</label>
    <input type="text" class="form-control" name="name" value="{{ $record->name or null }}" required>
</div>

<div class="form-group">
<label>{{ __('common.plan') }}</label>
{{ Form::select('plan', config('pmaps.plans'), isset($record->plan) ? $record->plan : " ", ['class' => 'form-control', 'style' => 'width:100%']) }}
</div>

<label>{{ __('common.status') }}</label><br>

<div class="radio">
	<label for="Active"><input type="radio" id="Active" value="1" name="status" {{ isset($record->status) && $record->status == '1' ? "checked" : ""}}> {{ __('common.active') }}</label>
</div>

<div class="radio">
	<label for="Inactive"><input type="radio" id="Inactive" value="0" name="status" {{ isset($record->status) && $record->status == '0' ? "checked" : ""}}> {{ __('common.inactive') }}</label>
</div>

