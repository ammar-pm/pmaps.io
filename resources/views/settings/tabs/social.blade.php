<div class="form-group">
	<label>{{ __('common.facebookurl') }}</label>
	<input type="text" class="form-control" name="settings[facebook]" value="{{ Config::get('facebook') }}">
</div>

<div class="form-group">
	<label>{{ __('common.linkedinurl') }}</label>
	<input type="text" class="form-control" name="settings[linkedin]" value="{{ Config::get('linkedin') }}">
</div>

<div class="form-group">
	<label>{{ __('common.twitterurl') }}</label>
	<input type="text" class="form-control" name="settings[twitter]" value="{{ Config::get('twitter') }}">
</div>
