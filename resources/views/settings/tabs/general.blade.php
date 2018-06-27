<div class="form-group">
	<label>{{ __('common.sitename') }}</label>
	<input type="text" class="form-control" name="settings[site_name]" value="{{ Config::get('site_name') }}">
</div>

<div class="form-group">
	<label>{{ __('common.sitedescription') }}</label>
	<textarea class="form-control" name="settings[site_description]">{{ Config::get('site_description') }}</textarea>
	<p class="text-muted">{{ __('common.under_160_characters') }}</p>
</div>


<div class="form-group">
	<label>{{ __('common.tagline') }}</label>
	<input type="text" class="form-control" name="settings[tag_line]" value="{{ Config::get('tag_line') }}">
</div>

<div class="form-group">
	<label>{{ __('common.phone') }}</label>
	<input type="tel" class="form-control" name="settings[phone]" value="{{ Config::get('phone') }}">
</div>

<div class="form-group">
	<label>{{ __('common.email') }}</label>
	<input type="email" class="form-control" name="settings[email]" value="{{ Config::get('email') }}">
</div>

<div class="form-group">
	<label>{{ __('common.featuredvideo') }}</label>
	<input type="text" class="form-control" name="settings[featured_video]" value="{{ Config::get('featured_video') }}">
</div>

<div class="form-group">
	<label>{{ __('common.featuredmap') }}</label>
	<input type="text" class="form-control" name="settings[featured_map]" value="{{ Config::get('featured_map') }}">
</div>